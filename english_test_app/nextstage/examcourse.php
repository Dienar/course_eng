<?php
session_start();
require_once "../../php/conn.php";
require_once "../islogged.php";

// Обработка отправки формы
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Проверка аутентификации пользователя
    if (!isset($_SESSION['user_id'])) {
        die("Ошибка: пользователь не аутентифицирован");
    }

    // Получаем данные пользователя
    $user_id = $_SESSION['user_id'];
    $course_id = 4; // ID курса "Подготовка к экзамену"
    
    // Собираем все ответы в массив
    $answers = [
        'listening' => [
            'q1' => $_POST['q1'] ?? null,
            'q2' => $_POST['q2'] ?? null
        ],
        'reading' => [
            'q1' => $_POST['q3'] ?? null,
            'q2' => $_POST['q4'] ?? null
        ],
        'writing' => [
            'essay' => $_POST['essay'] ?? null
        ],
        'timestamp' => date('Y-m-d H:i:s')
    ];
    
    // Преобразуем массив в JSON
    $answers_json = json_encode($answers, JSON_UNESCAPED_UNICODE);
    
    // Подготовка SQL запроса для вставки данных
    $stmt = $mysqli->prepare("INSERT INTO users_second_stage_course (user_id, course_id, answers) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $user_id, $course_id, $answers_json);
    
    if ($stmt->execute()) {
        // Перенаправляем после успешного сохранения
        header("Location: main.php?email=" . urlencode($_SESSION["email"]) . "&courseid=" . $course_id);
        exit();
    } else {
        die("Ошибка при сохранении результатов: " . $mysqli->error);
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Global - Подготовка к экзамену</title>
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
        <form method="POST" action="" id="examForm">
            <div class="test-header">
                <h1>Подготовка к экзамену</h1>
                <div class="progress-container">
                    <div class="progress-bar" id="progressBar"></div>
                </div>
            </div>

            <!-- Listening Section -->
            <div class="test-section listening-section active">
                <h2>Аудирование (Экзаменационный формат)</h2>
                <p>Прослушайте академическую лекцию и ответьте на вопросы</p>
                
                <div class="audio-container">
                    <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" 
                         alt="Академическая лекция" class="audio-image">
                    
                    <audio id="testAudio" src="https://example.com/academic_lecture.mp3"></audio>
                    
                    <div class="audio-controls">
                        <button type="button" class="audio-btn play-btn">
                            <i class="fas fa-play"></i> Проиграть
                        </button>
                        <button type="button" class="audio-btn repeat-btn">
                            <i class="fas fa-redo"></i> Повторить
                        </button>
                    </div>
                </div>
                
                <div class="questions-container">
                    <div class="question">
                        <p>1. Какая основная тема лекции?</p>
                        <div class="option">
                            <label>
                                <input type="radio" name="q1" value="a" required>
                                Квантовая физика
                            </label>
                        </div>
                        <div class="option">
                            <label>
                                <input type="radio" name="q1" value="b">
                                Эволюция языков
                            </label>
                        </div>
                        <div class="option">
                            <label>
                                <input type="radio" name="q1" value="c">
                                Экономика развивающихся стран
                            </label>
                        </div>
                    </div>
                    
                    <div class="question">
                        <p>2. Какие три основных пункта выделил профессор?</p>
                        <input type="text" name="q2" class="text-answer" placeholder="Перечислите через запятую..." required>
                    </div>
                </div>
            </div>

            <!-- Reading Section -->
            <div class="test-section reading-section">
                <h2>Академическое чтение</h2>
                <p>Прочитайте текст и ответьте на вопросы</p>
                
                <div class="reading-content">
                    <img src="https://images.unsplash.com/photo-1456513080510-7bf3a84b82f8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" 
                         alt="Академический текст" class="reading-image">
                    
                    <div class="reading-text">
                        <h3>Когнитивные искажения в принятии решений</h3>
                        <p>В современной психологии принятия решений когнитивные искажения рассматриваются как систематические отклонения от рациональности в суждениях. Исследования Дэниела Канемана и Амоса Тверски в 1970-х годах заложили основу поведенческой экономики, продемонстрировав, что люди часто принимают решения на основе эвристик, а не строгого анализа.</p>
                        <p>Одним из наиболее изученных искажений является "эффект якоря" (anchoring bias), когда первая полученная информация непропорционально влияет на последующие суждения. В классическом эксперименте испытуемые, видевшие случайное число перед оценкой количества африканских стран в ООН, давали ответы, статистически смещённые в сторону этого числа.</p>
                        <p>Другим важным искажением является "предвзятость подтверждения" (confirmation bias) - тенденция искать, интерпретировать и запоминать информацию, подтверждающую уже существующие убеждения, игнорируя противоречащие данные.</p>
                    </div>
                </div>
                
                <div class="questions-container">
                    <div class="question">
                        <p>1. Какие два ученых заложили основы поведенческой экономики?</p>
                        <input type="text" name="q3" class="text-answer" placeholder="Введите фамилии ученых" required>
                    </div>
                    
                    <div class="question">
                        <p>2. Какое искажение описывает влияние первоначальной информации?</p>
                        <div class="option">
                            <label>
                                <input type="radio" name="q4" value="a" required>
                                Эффект якоря
                            </label>
                        </div>
                        <div class="option">
                            <label>
                                <input type="radio" name="q4" value="b">
                                Предвзятость подтверждения
                            </label>
                        </div>
                        <div class="option">
                            <label>
                                <input type="radio" name="q4" value="c">
                                Эффект ореола
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Writing Section -->
            <div class="test-section writing-section">
                <h2>Академическое письмо</h2>
                <p>Напишите эссе на заданную тему</p>
                
                <div class="writing-content">
                    <div class="writing-prompt">
                        <h3>Тема эссе:</h3>
                        <p>"Как когнитивные искажения влияют на процесс принятия важных решений в профессиональной сфере? Приведите конкретные примеры и возможные способы минимизации их влияния."</p>
                        <p>Объем: 250-300 слов</p>
                    </div>
                    
                    <textarea name="essay" class="essay-text" placeholder="Начните писать ваше эссе здесь..." required></textarea>
                    
                    <div class="writing-tips">
                        <h4>Критерии оценки:</h4>
                        <ul>
                            <li>Логическая структура и связность</li>
                            <li>Использование академической лексики</li>
                            <li>Подкрепление аргументов примерами</li>
                            <li>Грамматическая точность</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <div class="test-navigation">
                <button type="button" class="nav-btn prev-btn" disabled>
                    <i class="fas fa-arrow-left"></i> Назад
                </button>
                <button type="button" class="nav-btn next-btn">
                    Далее <i class="fas fa-arrow-right"></i>
                </button>
                <button type="submit" class="nav-btn submit-btn hidden">
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
            // Генерация CSRF токена
            const csrfToken = Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15);
            document.querySelector('#examForm').insertAdjacentHTML('afterbegin', `<input type="hidden" name="csrf_token" value="${csrfToken}">`);

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
                sections.forEach((section, index) => {
                    section.classList.toggle('active', index === currentSection);
                });
                
                prevBtn.disabled = currentSection === 0;
                nextBtn.classList.toggle('hidden', currentSection === sections.length - 1);
                submitBtn.classList.toggle('hidden', currentSection !== sections.length - 1);
                
                const progress = ((currentSection + 1) / sections.length) * 100;
                progressBar.style.width = `${progress}%`;
            }
            
            function validateCurrentSection() {
                const currentSectionEl = sections[currentSection];
                const requiredInputs = currentSectionEl.querySelectorAll('[required]');
                let isValid = true;
                
                requiredInputs.forEach(input => {
                    if (input.type === 'radio') {
                        const name = input.name;
                        const checked = currentSectionEl.querySelector(`input[name="${name}"]:checked`);
                        if (!checked) {
                            isValid = false;
                            input.closest('.question').style.backgroundColor = '#ffe6e6';
                            setTimeout(() => {
                                input.closest('.question').style.backgroundColor = '';
                            }, 2000);
                        }
                    } else if ((input.type === 'text' || input.tagName === 'TEXTAREA') && !input.value.trim()) {
                        isValid = false;
                        input.style.borderColor = '#ff6b6b';
                        setTimeout(() => {
                            input.style.borderColor = '';
                        }, 2000);
                    }
                });
                
                if (!isValid) {
                    alert('Пожалуйста, ответьте на все обязательные вопросы в этом разделе.');
                }
                
                return isValid;
            }
            
            nextBtn.addEventListener('click', function() {
                if (validateCurrentSection()) {
                    if (currentSection < sections.length - 1) {
                        currentSection++;
                        updateNavigation();
                    }
                }
            });
            
            prevBtn.addEventListener('click', function() {
                if (currentSection > 0) {
                    currentSection--;
                    updateNavigation();
                }
            });
            
            // Обработка отправки формы
            const examForm = document.getElementById('examForm');
            examForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Проверяем все обязательные поля
                if (!validateCurrentSection()) {
                    return;
                }
                
                // Показываем индикатор загрузки
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Отправка...';
                submitBtn.disabled = true;
                
                // Отправляем форму
                fetch(examForm.action, {
                    method: 'POST',
                    body: new FormData(examForm),
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => {
                    if (!response.ok) throw new Error('Network error');
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        window.location.href = `main.php?email=${encodeURIComponent(data.email)}&courseid=${data.course_id}`;
                    } else {
                        alert(data.message || 'Ошибка при отправке ответов');
                        submitBtn.innerHTML = '<i class="fas fa-paper-plane"></i> Отправить';
                        submitBtn.disabled = false;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Ошибка при отправке данных. Пожалуйста, попробуйте ещё раз.');
                    submitBtn.innerHTML = '<i class="fas fa-paper-plane"></i> Отправить';
                    submitBtn.disabled = false;
                });
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
    </script>
</body>
</html>