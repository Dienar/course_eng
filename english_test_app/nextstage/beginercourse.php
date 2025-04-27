<?php
session_start();
require_once "../../php/conn.php";
require_once "../islogged.php";

// Проверяем, была ли отправлена форма с эссе
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['essay'])) {
    $user_id = $_SESSION['user_id'];
    $course_id = 2; // ID курса "Уровень носителя языка"
    $essays = $_POST['essay']; // массив значений
    $completion_date = date('Y-m-d H:i:s');

    // Объединяем все эссе в одну строку (можно использовать "\n" или другой разделитель)
    $essay_combined = implode("\n---\n", array_map('trim', $essays));

    $stmt = $mysqli->prepare("INSERT INTO users_second_stage_course (user_id, course_id, essay, completed_at) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iiss", $user_id, $course_id, $essay_combined, $completion_date);

    if ($stmt->execute()) {
        header("Location: main.php?email=" . $_SESSION["email"] . "&courseid=" . $course_id);
        exit();
    } else {
        echo "Ошибка при сохранении эссе: " . $mysqli->error;
    }
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Global - Обучение с нуля</title>
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
    <form method="POST">
    <div class="test-container">
        <div class="test-header">
            <h1>Обучение английскому с нуля</h1>
            <div class="progress-container">
                <div class="progress-bar" id="progressBar"></div>
            </div>
        </div>

        <!-- Vocabulary Section -->
        <div class="test-section vocabulary-section active">
            <h2>Базовый словарный запас</h2>
            <p>Изучите основные слова и фразы для начинающих</p>
            
            <div class="vocabulary-container">
                <img src="https://images.unsplash.com/photo-1546410531-bb4caa6b424d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" 
                     alt="Базовые слова" class="vocabulary-image">
                
                <div class="words-list">
                    <div class="word-card">
                        <div class="word">Hello</div>
                        <div class="translation">Привет</div>
                        <button class="audio-btn"><i class="fas fa-volume-up"></i></button>
                    </div>
                    <div class="word-card">
                        <div class="word">Goodbye</div>
                        <div class="translation">До свидания</div>
                        <button class="audio-btn"><i class="fas fa-volume-up"></i></button>
                    </div>
                    <div class="word-card">
                        <div class="word">Thank you</div>
                        <div class="translation">Спасибо</div>
                        <button class="audio-btn"><i class="fas fa-volume-up"></i></button>
                    </div>
                    <div class="word-card">
                        <div class="word">My name is...</div>
                        <div class="translation">Меня зовут...</div>
                        <button class="audio-btn"><i class="fas fa-volume-up"></i></button>
                    </div>
                </div>
            </div>
            
            <div class="questions-container">
                <div class="question">
                    <p>1. Выберите правильный перевод для "Thank you":</p>
                    <div class="option">
                        <label>
                            <input type="radio" name="q1" value="a">
                            Пожалуйста
                        </label>
                    </div>
                    <div class="option">
                        <label>
                            <input type="radio" name="q1" value="b">
                            Спасибо
                        </label>
                    </div>
                    <div class="option">
                        <label>
                            <input type="radio" name="q1" value="c">
                            Извините
                        </label>
                    </div>
                </div>
                
                <div class="question">
                    <p>2. Как сказать по-английски "До свидания"?</p>
                    <input type="text" class="text-answer" name="essay[]" placeholder="Введите ответ...">
                </div>
            </div>
        </div>

        <!-- Grammar Section -->
        <div class="test-section grammar-section">
            <h2>Основы грамматики</h2>
            <p>Изучите простые грамматические конструкции</p>
            
            <div class="grammar-content">
                <img src="https://images.unsplash.com/photo-1546410531-bb4caa6b424d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" 
                     alt="Грамматика" class="grammar-image">
                
                <div class="grammar-rules">
                    <h3>Глагол "to be" (быть)</h3>
                    <table>
                        <tr>
                            <th>Местоимение</th>
                            <th>Форма глагола</th>
                        </tr>
                        <tr>
                            <td>I</td>
                            <td>am</td>
                        </tr>
                        <tr>
                            <td>You</td>
                            <td>are</td>
                        </tr>
                        <tr>
                            <td>He/She/It</td>
                            <td>is</td>
                        </tr>
                    </table>
                    <p class="example">Пример: I am a student. (Я студент)</p>
                </div>
            </div>
            
            <div class="questions-container">
                <div class="question">
                    <p>1. Выберите правильную форму: She ___ a teacher.</p>
                    <div class="option">
                        <label>
                            <input type="radio" name="q2" value="a">
                            am
                        </label>
                    </div>
                    <div class="option">
                        <label>
                            <input type="radio" name="q2" value="b">
                            is
                        </label>
                    </div>
                    <div class="option">
                        <label>
                            <input type="radio" name="q2" value="c">
                            are
                        </label>
                    </div>
                </div>
                
                <div class="question">
                    <p>2. Составьте предложение: (you/happy)</p>
                    <input type="text" class="text-answer" name="essay[]" placeholder="Введите предложение...">
                </div>
            </div>
        </div>

        <!-- Practice Section -->
        <div class="test-section practice-section">
            <h2>Практика общения</h2>
            <p>Потренируйтесь в простых диалогах</p>
            
            <div class="practice-content">
                <div class="dialogue">
                    <div class="dialogue-line">
                        <div class="speaker">Teacher:</div>
                        <div class="text">Hello! What's your name?</div>
                        <button class="audio-btn"><i class="fas fa-volume-up"></i></button>
                    </div>
                    <div class="dialogue-line user-line">
                        <div class="speaker">You:</div>
                        <div class="text">My name is <input type="text" class="dialogue-answer" name="essay[]" placeholder="Ваше имя"></div>
                    </div>
                    <div class="dialogue-line">
                        <div class="speaker">Teacher:</div>
                        <div class="text">Nice to meet you! How are you?</div>
                        <button class="audio-btn"><i class="fas fa-volume-up"></i></button>
                    </div>
                    <div class="dialogue-line user-line">
                        <div class="speaker">You:</div>
                        <div class="text">I am <input type="text" class="dialogue-answer" name="essay[]" placeholder="Ваш ответ"></div>
                    </div>
                </div>
                
                <div class="practice-tips">
                    <h4>Полезные фразы:</h4>
                    <ul>
                        <li>Nice to meet you! - Приятно познакомиться!</li>
                        <li>I'm fine, thank you. - У меня все хорошо, спасибо.</li>
                        <li>And you? - А вы?</li>
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
                    <i class="fas fa-paper-plane"></i> Завершить урок
            </button>

        </div> <!-- конец test-container -->
    
    </div>
</form>
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
            // Audio for words
            const audioButtons = document.querySelectorAll('.audio-btn');
            audioButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    // Здесь будет воспроизведение аудио для слова/фразы
                    const word = this.parentElement.querySelector('.word').textContent;
                    alert("Воспроизводится: " + word);
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
            
            submitBtn.addEventListener('click', function() {
                alert('Урок завершен! Вы молодец!');
               
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