<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Global - Личный кабинет - Разговорный курс</title>
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon-16x16.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <script src="congrutilarion.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
</head>
<body>
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
        <div class="menu-icon absolut" id="menu-icon2">
            <i class="fas fa-bars"></i>
        </div>
            <a href="../index_loged.php">Курсы</a>
            <a href="../index_loged.php">О нас</a>
            <a href="../index_loged.php">Выход</a>
        </div>
    </div>
    <main>
    <?php
session_start();
require_once "../php/conn.php";

if(empty($_SESSION['user_id'])){
    echo "<script>alert('Повторите попытку входа!')</script>";
    echo "<script>window.location.replace('../')</script>";
}
$user_id = $_SESSION['user_id'];

// Получаем все курсы с прогрессом 100%
$stmt = $mysqli->prepare("SELECT course_id FROM user_progress WHERE user_id = ? AND progress = 100");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$completed_courses = $stmt->get_result();

// Обрабатываем все завершенные курсы
while ($course = $completed_courses->fetch_assoc()) {
    $course_id = $course['course_id'];
    $_SESSION['course_completed_'.$course_id] = true;
    
    // Показываем поздравление для каждого курса
    echo '<script>showCourseCongrats('.$course_id.');</script>';
    
    // Устанавливаем ссылки для следующих этапов
    switch($course_id) {
        case 1:
            $_SESSION['nextcourse1'] = "<a class='btn primary' href='../english_test_app/nextstage?selectcourse=1'>Вторая часть курса</a>";
            break;
        case 2:
            $_SESSION['nextcourse2'] = "<a class='btn primary' href='../english_test_app/nextstage?selectcourse=2'>Вторая часть курса</a>";
            break;
        case 3:
            $_SESSION['nextcourse3'] = "<a class='btn primary' href='../english_test_app/nextstage?selectcourse=3'>Вторая часть курса</a>";
            break;
        case 4:
            $_SESSION['nextcourse4'] = "<a class='btn primary' href='../english_test_app/nextstage?selectcourse=4'>Вторая часть курса</a>";
            break;
    }
}

// Получаем общий прогресс (первый попавшийся)
$stmt = $mysqli->prepare("SELECT progress FROM user_progress WHERE user_id = ? LIMIT 1");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$progress = $row ? $row['progress'] : 0;
        $stmt = $mysqli->query("SELECT name FROM users WHERE id = $user_id");
        if ($stmt) {
            $row = $stmt->fetch_assoc();
            if ($row) {
                echo '<h2 style=text-align:center>Добро пожаловать, ' . htmlspecialchars($row['name']) . '!</h2>';
            } else {
                echo '<h2>Пользователь не найден</h2>';
            }
            $stmt->close();
        } else {
            echo '<h2>Ошибка запроса</h2>';
        }
        ?>
        <div class="all_conversation-test">
            <?php
            require_once "../php/conn.php";
            if ($_SESSION['email'] === null) {
                echo "<section class='conversation-test empty_course'>
                    <h2>Добро пожаловать в ваш личный кабинет !</h2>
                    <p id='question'>Здесь вы можете увидеть все ваши купленные курсы.</p>
                    <p id='question' style='margin-bottom: 1em;'>Для того чтобы совершить покупку, просто зайдите на главную страницу.</p>
                    <a class='btn primary' href='../index_loged.php'>Перейти в магазин</a>
                </section>";
            } else {
                $email = $_SESSION['email'];
                $sql = $mysqli->prepare("SELECT course_id from users_purchases where email = ?");
                $sql->bind_param("s", $email);
                $sql->execute();
                $all_courses = $sql->get_result();
                if ($all_courses->num_rows > 0) {
                    while ($row = $all_courses->fetch_assoc()) {
                        $_SESSION['course_id'] = $row['course_id'];
                        switch ($row['course_id']) {
                            case 1:
                                echo "<section class='conversation-test'>
                                    <h2>Разговорный тест</h2>
                                    <img src='https://avatars.mds.yandex.net/i?id=33338c34eb85f1d4b743bebab17c9f50b7e93d98-9182046-images-thumbs&n=13' alt=''>
                                    <p id='question'>Нажмите 'Начать тест', чтобы начать.</p>
                                    <h1 id='userProg1'></h1>
                                    <div class='progress-bar'>
                                        <div class='progress' id='userProgress1' style='width: $progress%;'></div>
                                        
                                    </div>
                                    "
                                    
                                  .(!empty($_SESSION['nextcourse1']) ? $_SESSION['nextcourse1'] : "<a class='btn primary' href='../english_test_app/conversational_course.php?selectcourse=1'>Начать тест</a>") .
                                "</section> ";
                                
                                break;
                            case 2:
                                echo "<section class='conversation-test'>
                                    <h2>Научиться с нуля</h2>
                                    <img src='https://sun9-32.userapi.com/impg/QFiJ8UEzUjCZPiS7L-jNW6d0Uf3ups1VV0cCow/O7NUfX6rY8s.jpg?size=480x320&quality=95&sign=dcedafdf2937bf90d49f2c2b2b1658e0&type=album' alt=''>
                                    <p id='question'>Нажмите 'Начать тест', чтобы начать.</p>
                                    <h1 id='userProg2'></h1>
                                    
                                    <div class='progress-bar'>
                                        <div class='progress' id='userProgress2' style='width: $progress%;'></div>
                                    </div>
                                    "
                                     . (!empty($_SESSION['nextcourse2']) ? $_SESSION['nextcourse2'] : "<a class='btn primary' href='../english_test_app/start_level.php?selectcourse=2'>Начать тест</a>") .
                                "</section>";
                                break;
                            case 3:
                                echo "<section class='conversation-test'>
                                    <h2>Уровень Носителя</h2>
                                    <img src='https://avatars.mds.yandex.net/i?id=5f4edd76e46fded3161ffa44814a5f04428aa2a4-4866923-images-thumbs&n=13' alt=''>
                                    <p id='question'>Нажмите 'Начать тест', чтобы начать.</p>
                                    
                                    <h1 id='userProg3'></h1>
                                    <div class='progress-bar'>
                                        <div class='progress' id='userProgress3' style='width: $progress%;'></div>
                                    </div>
                                    "
                                    . (!empty($_SESSION['nextcourse3']) ? $_SESSION['nextcourse3'] : "<a class='btn primary' href='../english_test_app/index.php?selectcourse=3'>Начать тест</a>").
                                "</section>";
                                break;
                            case 4:
                                echo "<section class='conversation-test'>
                                    <h2>Тест для подготовки к экзамену</h2>
                                    <img src='https://avatars.mds.yandex.net/i?id=5c963776f270e52c464cc530c3f544682fee497b-5137308-images-thumbs&n=13' alt=''>
                                    <p id='question'>Нажмите 'Начать тест', чтобы начать.</p>
                                    <h1 id='userProg4'></h1>
                                    
                                    <div class='progress-bar'>
                                        <div class='progress' id='userProgress4' style='width: $progress%;'></div>
                                    </div>
                                    "
                                    . (!empty($_SESSION['nextcourse4']) ? $_SESSION['nextcourse4'] : "<a class='btn primary' href='../english_test_app/exam_preparation.php?selectcourse=4'>Начать тест</a>").
                                "</section>";
                                break;
                        }
                    }
                } else {
                    echo "<section class='conversation-test empty_course'>
                        <h2>Добро пожаловать в ваш личный кабинет !</h2>
                        <img src='https://avatars.mds.yandex.net/i?id=a174797fdad1115a2927d68edfc10165d21c2233-9245612-images-thumbs&n=13' alt=''>
                        <p id='question'>Здесь вы можете увидеть все ваши купленные курсы.</p>
                        <p id='question' style='margin-bottom: 1em;'>Для того чтобы совершить покупку, просто зайдите на главную страницу.</p>
                        <a class='btn primary' href='../index_loged.php'>Перейти в магазин</a>
                    </section>";
                }
            }
            ?>
        </div>
        <section class="courses">
            <h2>Популярные курсы</h2>
            <div class="course-list">
                <div class="course-card">
                    <h3>Научиться с нуля!</h3>
                    <p>Освойте базовый уровень английского языка.</p>
                    <p>Доступная цена!</p>
                    <p>Быстрое обучение!</p>
                    <button class="btn">Подробнее</button>
                </div>
                <div class="course-card">
                    <h3>Уровень носителя!</h3>
                    <p>Научиться грамматике и лексике!</p>
                    <p>Доступная цена!</p>
                    <p>Огромное количество практики!</p>
                    <button class="btn">Подробнее</button>
                </div>
                <div class="course-card">
                    <h3>Подготовка к экзаменам</h3>
                    <p>Поможем успешно сдать ЕГЭ и ОГЭ.</p>
                    <p>Подготовим с нуля!</p>
                    <p>Быстрая подготовка!</p>
                    <button class="btn">Подробнее</button>
                </div>
            </div>
        </section>
    </main>
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
            <a href="">Правила акции</a>
            <a href="">Оферта</a>
            <a href="">Политика конфидециальности</a>
            <p>© Global, 2024</p>
        </div>
    </div>
    <div id="congratsPopup" class="congrats-popup">
	<div class="congrats-content">
		<span class="close-popup">&times;</span>
		<h2>🎉 Поздравляем! 🎉</h2>
		<p style="margin-bottom: 1em;">Вы успешно завершили 1 этап курса!</p>
		<div class="confetti"></div>
		<button class="btn primary">Продолжить обучение</button>
	</div>
</div>
    <script src="scripts.js"></script>
    <script>
        document.getElementById('userProgress').style.width = '<?php echo $progress; ?>%';
    </script>
</body>
</html>