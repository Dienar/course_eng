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
</head>
<body>
    <div class="global_list_button_container">
        <div class="container_circle_text">
        <div class="circle_container">
            <div class="circle_main">
                <div class="circle_text_container">
                    <div class = "circle_text">
                       G
                    </div>
                </div>
            </div>
        </div>
        <div class="block_text"><p>Global</p></div>
    </div>
    <div class="list_container">
        <a href="">Тестовый курс</a>
        <a href="">Курсы</a>
        <a href="">Помощь</a>
        <a href="">О нас</a>
    </div>
    <div class="register_container"><a href="../index.php"><i class="fa-solid fa-right-from-bracket"></i> Exit</a>
    </div>
</div>
    <main>
        
        <!-- Разговорный тест -->
         <div class="all_conversation-test"><?php
        require_once "../php/conn.php";
        session_start();
        if($_SESSION['email'] === null){
            echo "<section class='conversation-test empty_course'>
            <h2>Добро пожаловать в ваш личный кабинет !</h2>
            <p id='question'>Здесь вы можете увидеть все ваши купленные курсы.</p>
            <p id='question'>Для того чтобы совершить покупку, просто зайдите на главную страницу.</p>
            <a class='btn primary' href='../index.php'>Перейти в магазин</a>
            </section>";
        }else{
        $email = $_SESSION['email'];
        $sql = $mysqli->prepare("SELECT course_id from users_purchases where email = ?");
        $sql->bind_param("s",$email);
        $sql->execute();
        $all_courses = $sql->get_result();
        while($row = $all_courses->fetch_assoc()){
            echo $row['course_id'];
            switch ($row['course_id']){
                case 1:
                    echo "
            <section class='conversation-test'>
            <h2>Разговорный тест</h2>
            <img src='https://avatars.mds.yandex.net/i?id=33338c34eb85f1d4b743bebab17c9f50b7e93d98-9182046-images-thumbs&n=13' alt=''>
            <p id='question'>Нажмите 'Начать тест', чтобы начать.</p>
            <a class='btn primary unactive' href='#'>Начать тест</a>
            </section>";
                    break;
                case 2:
                    echo "
            <section class='conversation-test'>
            <h2>Уровень носителя</h2>
            <img src='https://sun9-32.userapi.com/impg/QFiJ8UEzUjCZPiS7L-jNW6d0Uf3ups1VV0cCow/O7NUfX6rY8s.jpg?size=480x320&quality=95&sign=dcedafdf2937bf90d49f2c2b2b1658e0&type=album' alt=''>
            <p id='question'>Нажмите 'Начать тест', чтобы начать.</p>
            <a class='btn primary unactive'  href='#'>Начать тест</a>
            </section>";
                    break; 
                case 3:
                    echo "
            <section class='conversation-test'>
            <h2>Разговорный тест</h2>
            <img src='https://avatars.mds.yandex.net/i?id=845e4d24432e04ef83d0a78b0ea2ddd1f53bd43a-12935885-images-thumbs&n=13' alt=''>
            <p id='question'>Нажмите 'Начать тест', чтобы начать.</p>
            <a class='btn primary' href='../english_test_app/index.php'>Начать тест</a>
            </section>";
                    break; 
                case 4:
                     echo "
            <section class='conversation-test'>
            <h2>Разговорный тест</h2>
            <img src='https://avatars.mds.yandex.net/i?id=845e4d24432e04ef83d0a78b0ea2ddd1f53bd43a-12935885-images-thumbs&n=13' alt=''>
            <p id='question'>Нажмите 'Начать тест', чтобы начать.</p>
            <a class='btn primary' href='../english_test_app/index.php'>Начать тест</a>
            </section>";
                    break;
                    default:
                    echo "Вы еще не приобрели ни одного урока";
                    break;
            }
            
        }
    }
        ?>
    </div>
        <!-- Дополнительный контент -->
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

    <!-- Футер сайта -->
    <div class="container_circle_text bottom_block">
        <div class="circle_container">
            <div class="circle_main">
                <div class="circle_text_container">
                    <div class = "circle_text">
                       G
                    </div>
                </div>
            </div>
        </div>
        <div class="list_container_a"><p>Global</p>
        <a href="">Правила акции</a>
        <a href="">Оферта</a>
        <a href="">Политика конфидециальности</a>
        <p>© Global, 2024</p>
        </div></div>

    <script src="scripts.js"></script>
</body>
</html>
