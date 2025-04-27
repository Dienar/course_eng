<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Global - Личный кабинет</title>
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon-16x16.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php
    session_start(); // Должно быть в самом начале файла
?>
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
            <a href="../index_loged.php">Тестовый курс</a>
            <a href="../index_loged.php">Курсы</a>
            <a href="../index_loged.php">Помощь</a>
            <a href="../index_loged.php">О нас</a>
            <a href="../index_loged.php">Exit</a>
        </div>
    </div>
    <main>
        <?php
        require_once "../php/conn.php";
        
        $user_id = $_SESSION['user_id'];

        $stmt = $mysqli->prepare("SELECT progress FROM user_progress WHERE user_id = ?");
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
                                    <div class='progress-bar'>
                                        <div class='progress' id='userProgress1' style='width: $progress%;'></div>
                                    </div>
                                    <a class='btn primary' href='../english_test_app/conversational_course.php?selectcourse=1'>Начать тест</a>
                                </section>";
                                break;
                            case 2:
                                echo "<section class='conversation-test'>
                                    <h2>Научиться с нуля</h2>
                                    <img src='https://sun9-32.userapi.com/impg/QFiJ8UEzUjCZPiS7L-jNW6d0Uf3ups1VV0cCow/O7NUfX6rY8s.jpg?size=480x320&quality=95&sign=dcedafdf2937bf90d49f2c2b2b1658e0&type=album' alt=''>
                                    <p id='question'>Нажмите 'Начать тест', чтобы начать.</p>
                                    <div class='progress-bar'>
                                        <div class='progress' id='userProgress2' style='width: $progress%;'></div>
                                    </div>
                                    <a class='btn primary' href='../english_test_app/start_level.php?selectcourse=2'>Начать тест</a>
                                </section>";
                                break;
                            case 3:
                                echo "<section class='conversation-test'>
                                    <h2>Уровень Носителя</h2>
                                    <img src='https://avatars.mds.yandex.net/i?id=5f4edd76e46fded3161ffa44814a5f04428aa2a4-4866923-images-thumbs&n=13' alt=''>
                                    <p id='question'>Нажмите 'Начать тест', чтобы начать.</p>
                                    <div class='progress-bar'>
                                        <div class='progress' id='userProgress3' style='width: $progress%;'></div>
                                    </div>
                                    <a class='btn primary' href='../english_test_app/index.php?selectcourse=3'>Начать тест</a>
                                </section>";
                                break;
                            case 4:
                                echo "<section class='conversation-test'>
                                    <h2>Тест для подготовки к экзамену</h2>
                                    <img src='https://avatars.mds.yandex.net/i?id=5c963776f270e52c464cc530c3f544682fee497b-5137308-images-thumbs&n=13' alt=''>
                                    <p id='question'>Нажмите 'Начать тест', чтобы начать.</p>
                                    <div class='progress-bar'>
                                        <div class='progress' id='userProgress4' style='width: $progress%;'></div>
                                    </div>
                                    <a class='btn primary' href='../english_test_app/exam_preparation.php?selectcourse=4'>Начать тест</a>
                                </section>";
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
                    <button href='../index_loged.php' class="btn">Подробнее</button>
                </div>
                <div class="course-card">
                    <h3>Уровень носителя!</h3>
                    <p>Научиться грамматике и лексике!</p>
                    <p>Доступная цена!</p>
                    <p>Огромное количество практики!</p>
                    <button href='../index_loged.php' class="btn">Подробнее</button>
                </div>
                <div class="course-card">
                    <h3>Подготовка к экзаменам</h3>
                    <p>Поможем успешно сдать ЕГЭ и ОГЭ.</p>
                    <p>Подготовим с нуля!</p>
                    <p>Быстрая подготовка!</p>
                    <button href='../index_loged.php' class="btn">Подробнее</button>
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
            <a href='../index_loged.php'>Правила акции</a>
            <a href='../index_loged.php'>Оферта</a>
            <a href='../index_loged.php'>Политика конфидециальности</a>
            <p>© Global, 2024</p>
        </div>
    </div>
    <script src="scripts.js"></script>
    <script>
        document.getElementById('userProgress').style.width = '<?php echo $progress; ?>%';
    </script>
</body>
</html>