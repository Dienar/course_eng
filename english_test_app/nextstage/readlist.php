<?php
session_start();
require_once "../../php/conn.php";
require_once "../islogged.php";

// Обработка отправки формы
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получаем данные пользователя
    $user_id = $_SESSION['user_id'];
    $course_id = 1; // ID текущего курса (Этап 2: Аудирование и Чтение)
    
    // Собираем ответы в массив
    $answers = [
        'listening' => [
            'q1' => $_POST['q1'] ?? null,
            'q2' => $_POST['q2'] ?? null
        ],
        'reading' => [
            'q1' => $_POST['q3'] ?? null,
            'q2' => $_POST['q4'] ?? null
        ]
    ];
    
    // Преобразуем массив в JSON для хранения в базе
    $answers_json = json_encode($answers, JSON_UNESCAPED_UNICODE);
    
    // Рассчитываем прогресс (примерно, можно доработать)
    $progress = 50; // Базовый прогресс за отправку ответов
    $total_questions = 4;
    $answered = 0;
    
    foreach ($answers as $section) {
        foreach ($section as $answer) {
            if (!empty($answer)) $answered++;
        }
    }
    
    $progress = min(100, round(($answered / $total_questions) * 100));
    $completion_date = date('Y-m-d H:i:s');
    try {
        // Проверяем, есть ли уже запись для этого пользователя и курса
        $stmt = $mysqli->prepare("SELECT user_id FROM users_second_stage_course WHERE user_id = ? AND course_id = ?");
        $stmt->bind_param("is", $user_id, $course_id);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows > 0) {
            // Обновляем существующую запись
            $stmt = $mysqli->prepare("UPDATE users_second_stage_course SET essay = ? WHERE user_id = ? AND course_id = ? AND completed_at = ?");
            $stmt->bind_param("siis", $answers_json, $user_id, $course_id, $completion_date);
        } else {
            // Создаем новую запись
            $stmt = $mysqli->prepare("INSERT INTO users_second_stage_course (user_id, course_id, essay, completed_at ) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("isis", $user_id, $course_id, $answers_json, $completion_date);
        }
        
        if ($stmt->execute()) {
            // Перенаправляем после успешного сохранения
            header("Location: main.php?email=" . $_SESSION["email"] . "&courseid=" . $course_id);
            exit();
        } else {
            throw new Exception("Ошибка при сохранении прогресса: " . $mysqli->error);
        }
    } catch (Exception $e) {
        die("Произошла ошибка: " . $e->getMessage());
    }
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Global - Аудирование и Чтение</title>
    <link rel="apple-touch-icon" sizes="180x180" href="../../favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../favicon/favicon-16x16.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="test_styles.css">
</head>
<body>
    <!-- Header -->
    <div class="global_list_button_container">
        <div class="container_circle_text">
            <div class="circle_container">
                <div class="circle_main">
                    <div class="circle_text_container">
                        <div class="circle_text">G</div>
                    </div>
                </div>
            </div>
            <div class="block_text"><p>Global</p></div>
        </div>
        <div class="menu-icon" id="menu-icon">
            <i class="fas fa-bars"></i>
        </div>
        <div class="list_container" id="nav-menu">
            <a href="../../index_loged.php">Курсы</a>
            <a href="../../user.client/">Профиль</a> 
            <a href="../../php/logout.php" id="exit">Выход</a>
        </div>
        
    </div>

    <!-- Main Test Content -->
    <div class="test-container">
    <form method="POST" action="" id="testForm">
        <div class="test-header">
            <h1>Этап 2: Аудирование и Чтение</h1>
            <div class="progress-container">
                <div class="progress-bar" id="progressBar"></div>
            </div>
        </div>

        <!-- Listening Section -->
        <div class="test-section listening-section active">
            <h2>Аудирование</h2>
            <p>Прослушайте аудиозапись и ответьте на вопросы</p>
            
            <div class="audio-container">
                <img src="https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" 
                     alt="Аудирование" class="audio-image">
                
                <audio id="testAudio" src="https://example.com/audio_sample.mp3"></audio>
                
                <div class="audio-controls">
                    <button class="audio-btn play-btn">
                        <i class="fas fa-play"></i> Проиграть
                    </button>
                    <button class="audio-btn repeat-btn">
                        <i class="fas fa-redo"></i> Повторить
                    </button>
                </div>
            </div>
            
            <div class="questions-container">
                    <div class="question">
                        <p>1. О чем говорилось в аудиозаписи?</p>
                        <div class="option">
                            <label>
                                <input type="radio" name="q1" value="a">
                                О путешествии в горы
                            </label>
                        </div>
                    <div class="option">
                        <label>
                            <input type="radio" name="q1" value="b">
                            О научном эксперименте
                        </label>
                    </div>
                    <div class="option">
                        <label>
                            <input type="radio" name="q1" value="c">
                            О приготовлении блюда
                        </label>
                    </div>
                </div>
                
                <div class="question">
                        <p>2. Какой главный совет дал спикер?</p>
                        <input type="text" name="q2" class="text-answer" placeholder="Введите ваш ответ...">
                    </div>
            </div>
        </div>

        <!-- Reading Section -->
        <div class="test-section reading-section">
            <h2>Чтение</h2>
            <p>Прочитайте текст и ответьте на вопросы</p>
            
            <div class="reading-content">
                <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" 
                     alt="Иллюстрация к тексту" class="reading-image">
                
                <div class="reading-text">
                    <h3>Приключения в джунглях</h3>
                    <p>Группа исследователей отправилась в экспедицию в самые глубины амазонских джунглей. Их целью было изучение редких видов растений, которые, по слухам, обладали уникальными лечебными свойствами.</p>
                    <p>После двух недель путешествия по реке они наконец достигли удаленного района, где местные жители рассказали им о легендарном "цветке вечной молодости". По описанию это должно было быть небольшое растение с ярко-синими лепестками, растущее только на определенном типе деревьев.</p>
                    <p>Исследователи разделились на две группы. Первая отправилась на север, в то время как вторая группа пошла на юг. Именно южная группа сделала удивительное открытие...</p>
                </div>
            </div>
            
            <div class="questions-container">
                    <div class="question">
                        <p>1. Какова была цель экспедиции?</p>
                        <div class="option">
                            <label>
                                <input type="radio" name="q3" value="a">
                                Изучение животных джунглей
                            </label>
                        </div>
                    <div class="option">
                        <label>
                            <input type="radio" name="q2" value="b">
                            Поиск редких растений
                        </label>
                    </div>
                    <div class="option">
                        <label>
                            <input type="radio" name="q2" value="c">
                            Картографирование местности
                        </label>
                    </div>
                </div>
                
                <div class="question">
                        <p>2. Опишите, что они искали, согласно легенде?</p>
                        <input type="text" name="q4" class="text-answer" placeholder="Введите ваш ответ...">
                    </div>
            </div>
        </div>

        <!-- Navigation -->
        <div class="test-navigation">
                <button class="nav-btn prev-btn" type="button" disabled>
                    <i class="fas fa-arrow-left"></i> Назад
                </button>
                <button class="nav-btn next-btn" type="button">
                    Далее <i class="fas fa-arrow-right"></i>
                </button>
                <button class="nav-btn submit-btn hidden" type="submit">
                    <i class="fas fa-paper-plane"></i> Отправить
                </button>
            </div>
        </form>
    </div>

    <!-- Footer -->
    <div class="container_circle_text bottom_block">
        <div class="circle_container">
            <div class="circle_main">
                <div class="circle_text_container">
                    <div class="circle_text">G</div>
                </div>
            </div>
        </div>
        <div class="list_container_a">
            <p>Global</p>
            <a href="#">Правила акции</a>
            <a href="#">Оферта</a>
            <a href="#">Политика конфиденциальности</a>
            <p>© Global, 2024</p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Audio Player
            const audioPlayer = document.getElementById('testAudio');
            const playBtn = document.querySelector('.play-btn');
            const repeatBtn = document.querySelector('.repeat-btn');
            
            playBtn.addEventListener('click', function() {
                if (audioPlayer.paused) {
                    audioPlayer.play();
                    playBtn.innerHTML = '<i class="fas fa-pause"></i> Пауза';
                } else {
                    audioPlayer.pause();
                    playBtn.innerHTML = '<i class="fas fa-play"></i> Проиграть';
                }
            });
            
            repeatBtn.addEventListener('click', function() {
                audioPlayer.currentTime = 0;
                audioPlayer.play();
                playBtn.innerHTML = '<i class="fas fa-pause"></i> Пауза';
            });
            
            // Test Navigation
            const sections = document.querySelectorAll('.test-section');
            const prevBtn = document.querySelector('.prev-btn');
            const nextBtn = document.querySelector('.next-btn');
            const submitBtn = document.querySelector('.submit-btn');
            const progressBar = document.getElementById('progressBar');
            let currentSection = 0;
            
            function updateNavigation() {
                // Update section visibility
                sections.forEach((section, index) => {
                    section.classList.toggle('active', index === currentSection);
                });
                
                // Update buttons
                prevBtn.disabled = currentSection === 0;
                nextBtn.classList.toggle('hidden', currentSection === sections.length - 1);
                submitBtn.classList.toggle('hidden', currentSection !== sections.length - 1);
                
                // Update progress
                const progress = ((currentSection + 1) / sections.length) * 100;
                progressBar.style.width = `${progress}%`;
            }
            
            nextBtn.addEventListener('click', function() {
                if (currentSection < sections.length - 1) {
                    currentSection++;
                    updateNavigation();
                }
            });
            
            prevBtn.addEventListener('click', function() {
                if (currentSection > 0) {
                    currentSection--;
                    updateNavigation();
                }
            });
            
            submitBtn.addEventListener('click', function() {
                // Here you would normally send data to server
                alert('Тест завершен! Ответы отправлены.');
                window.location.href = 'main.php?email=<?php echo ($_SESSION["email"]); ?>&courseid=<?php echo (1); ?>';
            });
            
            // Mobile menu
            const menuIcon = document.getElementById('menu-icon');
            const navMenu = document.getElementById('nav-menu');
            
            menuIcon.addEventListener('click', function() {
                navMenu.style.display = navMenu.style.display === 'flex' ? 'none' : 'flex';
            });
            
            // Initialize
            updateNavigation();
        });
        
        function logout() {
            // Implement logout functionality
            if (confirm('Вы уверены, что хотите выйти?')) {
                window.location.href = 'logout.php';
            }
        }
    </script>
</body>
</html>