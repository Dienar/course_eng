<?php
session_start();
require_once "../../php/conn.php";
require_once "../islogged.php";

// Проверяем, была ли отправлена форма с эссе
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['essay'])) {
    $user_id = $_SESSION['user_id'];
    $course_id = 3; // ID курса "Уровень носителя языка"
    $essay = $_POST['essay'];
    $completion_date = date('Y-m-d H:i:s'); // Текущая дата и время
    
    // Подготовка SQL запроса
    $stmt = $mysqli->prepare("INSERT INTO users_second_stage_course (user_id, course_id, essay, completed_at) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iiss", $user_id, $course_id, $essay, $completion_date);
    
    if ($stmt->execute()) {
        // Перенаправляем пользователя после успешного сохранения
        header("Location: main.php?email=" . $_SESSION["email"] . "&courseid=" . $course_id);
        exit();
    } else {
        // Обработка ошибки
        echo "Ошибка при сохранении эссе: " . $mysqli->error;
    }
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Global - Уровень носителя</title>
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
        <form method="POST" action="">
            <div class="test-header">
                <h1>Уровень носителя языка</h1>
                <div class="progress-container">
                    <div class="progress-bar" id="progressBar"></div>
                </div>
            </div>

            <!-- Advanced Vocabulary Section -->
            <div class="test-section vocabulary-section active">
                <h2>Продвинутая лексика</h2>
                <p>Изучите идиомы и сложные выражения</p>
                
                <div class="vocabulary-container">
                    <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" 
                         alt="Продвинутая лексика" class="vocabulary-image">
                    
                    <div class="words-list">
                        <div class="word-card">
                            <div class="word">To hit the nail on the head</div>
                            <div class="translation">Попасть в точку (точно выразить мысль)</div>
                            <button class="audio-btn"><i class="fas fa-volume-up"></i></button>
                        </div>
                        <div class="word-card">
                            <div class="word">A blessing in disguise</div>
                            <div class="translation">Неожиданная удача в неприятной ситуации</div>
                            <button class="audio-btn"><i class="fas fa-volume-up"></i></button>
                        </div>
                        <div class="word-card">
                            <div class="word">To read between the lines</div>
                            <div class="translation">Читать между строк</div>
                            <button class="audio-btn"><i class="fas fa-volume-up"></i></button>
                        </div>
                        <div class="word-card">
                            <div class="word">To burn the midnight oil</div>
                            <div class="translation">Работать допоздна</div>
                            <button class="audio-btn"><i class="fas fa-volume-up"></i></button>
                        </div>
                    </div>
                </div>
                
                <div class="questions-container">
                    <div class="question">
                        <p>1. Какая идиома означает "работать допоздна"?</p>
                        <div class="option">
                            <label>
                                <input type="radio" name="q1" value="a">
                                To hit the nail on the head
                            </label>
                        </div>
                        <div class="option">
                            <label>
                                <input type="radio" name="q1" value="b">
                                To burn the midnight oil
                            </label>
                        </div>
                        <div class="option">
                            <label>
                                <input type="radio" name="q1" value="c">
                                A blessing in disguise
                            </label>
                        </div>
                    </div>
                    
                    <div class="question">
                        <p>2. Объясните значение выражения "to read between the lines" в контексте:</p>
                        <textarea class="text-answer" style="resize: none;" placeholder="Ваше объяснение..."></textarea>
                    </div>
                </div>
            </div>

            <!-- Nuances Section -->
            <div class="test-section nuances-section">
                <h2>Языковые нюансы</h2>
                <p>Изучите тонкости употребления сложных конструкций</p>
                
                <div class="nuances-content">
                    <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" 
                         alt="Языковые нюансы" class="nuances-image">
                    
                    <div class="nuances-rules">
                        <h3>Разница между:</h3>
                        <div class="nuance-item">
                            <p><strong>"He has gone"</strong> vs <strong>"He has been"</strong></p>
                            <p>"He has gone to Paris" - он сейчас в Париже (или в пути)</p>
                            <p>"He has been to Paris" - он был в Париже (и вернулся)</p>
                        </div>
                        <div class="nuance-item">
                            <p><strong>"I used to"</strong> vs <strong>"I'm used to"</strong></p>
                            <p>"I used to smoke" - я раньше курил (но теперь нет)</p>
                            <p>"I'm used to waking up early" - я привык рано вставать</p>
                        </div>
                    </div>
                </div>
                
                <div class="questions-container">
                    <div class="question">
                        <p>1. Выберите правильный вариант: "She ___ live in London, but now she lives in Madrid."</p>
                        <div class="option">
                            <label>
                                <input type="radio" name="q2" value="a">
                                used to
                            </label>
                        </div>
                        <div class="option">
                            <label>
                                <input type="radio" name="q2" value="b">
                                is used to
                            </label>
                        </div>
                        <div class="option">
                            <label>
                                <input type="radio" name="q2" value="c">
                                gets used to
                            </label>
                        </div>
                    </div>
                    
                    <div class="question">
                        <p>2. Объясните разницу между "I have seen that movie" и "I saw that movie":</p>
                        <textarea class="text-answer"  style="resize: none;" placeholder="Ваше объяснение..."></textarea>
                    </div>
                </div>
            </div>

            <!-- Debate Section -->
            <div class="test-section debate-section">
                <h2>Дебаты и аргументация</h2>
                <p>Потренируйтесь в продвинутых дискуссиях</p>
                
                <div class="debate-content">
                    <div class="debate-topic">
                        <h3>Тема дебатов:</h3>
                        <p>"Социальные сети приносят больше вреда, чем пользы для современного общества"</p>
                    </div>
                    
                    <div class="debate-positions">
                        <div class="position-card">
                            <h4>Аргументы "за":</h4>
                            <ul>
                                <li>Снижение качества живого общения</li>
                                <li>Распространение дезинформации</li>
                                <li>Проблемы с психическим здоровьем</li>
                            </ul>
                        </div>
                        <div class="position-card">
                            <h4>Аргументы "против":</h4>
                            <ul>
                                <li>Доступ к информации и образованию</li>
                                <li>Глобальная коммуникация</li>
                                <li>Возможности для бизнеса</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="debate-task">
                        <h4>Ваша задача:</h4>
                        <p>Напишите аргументированное эссе (300-350 слов), выражающее вашу позицию по данному вопросу. Используйте сложные грамматические конструкции и продвинутую лексику.</p>
                        <textarea class="essay-text" style="resize: none;" name="essay" placeholder="Начните писать ваше эссе здесь..." required></textarea>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <div class="test-navigation">
                <button class="nav-btn prev-btn" disabled>
                    <i class="fas fa-arrow-left"></i> Назад
                </button>
                <button class="nav-btn next-btn">
                    Далее <i class="fas fa-arrow-right"></i>
                </button>
                <button type="submit" class="nav-btn submit-btn hidden">
                    <i class="fas fa-paper-plane"></i> Завершить урок
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
            // Audio for phrases
            const audioButtons = document.querySelectorAll('.audio-btn');
            audioButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    const phrase = this.parentElement.querySelector('.word').textContent;
                    alert("Воспроизводится произношение: " + phrase);
                });
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