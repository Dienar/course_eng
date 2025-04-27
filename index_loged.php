<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Global</title>
<link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="manifest" href="/site.webmanifest">
    <script src="jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function(){
        $("#registr").on('submit',function(event){
            event.preventDefault();
            $.post("php/reg.php", $(this).serialize());
            event.target.reset();
            alert("Ваше сообщение отправлено");
        })
        })
    </script>
    <link rel="stylesheet" href="css/style.css">
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
<div class="menu-icon" id="menu-icon">
    <i class="fas fa-bars"></i>
</div>
<div class="list_container" id="nav-menu">
    <a href="#testcourse">Тестовый курс</a>
    <a href="#usercourse">Курсы</a>
    <a hhref="#" onclick="Reg_or_not()"> Профиль</a> 
        <a href="" id="exit" onclick="Reg_or_not2()">Выход</a>
       
</div>
<div class="list_container">
    <a href="#testcourse">Тестовый курс</a>
    <a href="#usercourse">Курсы</a>
    <a href="#helpinput"id="show-chat">Помощь</a>
    <a href="#login">О нас</a>
</div>
<div class="register_container media" >
<a href="#" class="register_container-profile" onclick="Reg_or_not()"> Профиль</a> 
<a href="" id="exit" onclick="Reg_or_not2()"><i class="fa-solid fa-right-from-bracket"></i></a>
</div>
</div>

<div class="img__container__start">
        <img src="img/women__ready.png" alt="">
    </div>
<div class="text_container_start">
    <div class="text_container_start_bold">
        <p>Английский - это <a class="text_container_start_bold__orange" id="helpinput">просто</a><br>
        Запишитесь на наш курс</p>
    </div>
    <div class="text_container_start_under_bold">
       <p> Мы поможем вам разобраться с английским, даже если будете обучаться с нуля, <br>
        Так же присутвует подготовка к ЕГЭ и ОГЭ</p><br>
    </div>
    <div class="text_container_start_button">
        <a href="#registr" class="text_container_start_button__button">Начать сейчас</a>
    </div>
    <form action="" id="ajax_form" method="post">
<div class="text_container_start_bold__input">
    <input type="text" name="message" id="message" required maxlength="100"
    placeholder="Есть какие то вопросы ? Ответим за 15 минут">
    <button type="submit" class="text_container_start_bold__input__img">➤</button>
</form>
</div>
</div>

<div class="users_container">
    <div class="users_container__img">
        <img src="img/user.png" alt="">
    </div>
    <div class="users_container__text">
    <span>45k+ Уже зарегистировались у нас. <a class="text_container_start_bold__orange__second__word">Попробуй и ты !</a></span>
    </div>
</div>
<div class="block_info_about">
    <div class="info_blocks">
        <div class="block_eng">
            <p class="block_eng_right eco blue"><?php 
            require "php/celect_course.php";
            while($result = mysqli_fetch_assoc($sql)){
                
                echo $result['prefix_course'];    
                
            } ?> 📊</p>
            <h3><?php require "php/celect_course.php";
            while($result = mysqli_fetch_assoc($sql)){
                
                echo $result['name_course'];    
                
            } ?>
            </h3>
            <p class="block_eng_plus">	🌟 <?php 
            require "php/celect_course.php";
            while($result = mysqli_fetch_assoc($sql)){
                
                echo $result['first_string'];    
                
            } ?></p>
            <p class="block_eng_plus">	🌟 <?php 
            require "php/celect_course.php";
            while($result = mysqli_fetch_assoc($sql)){
                
                echo $result['second_string'];    
                
            } ?></p>
            <p class="block_eng_plus">	🌟 <?php 
            require "php/celect_course.php";
            while($result = mysqli_fetch_assoc($sql)){
                
                echo $result['third_string'];    
                
            } ?></p>
            <p class="block_eng_time">&#8987; 20 уроков</p>
            <div class="block_eng_button">
            <a href="about_course/сonversationalcourse.php">Узнать подробнее</a>
        </div>
        </div>
        <div class="block_eng">
            <p class="block_eng_right eco" id="usercourse">Экономный 💵</p>
            <p class="block_eng_right"><?php 
            require "php/celect_course.php";

            while($result = mysqli_fetch_assoc($sql2)){
                
                echo $result['prefix_course'];    
                
            } ?> 🔥</p>
            <h3><?php 
            require "php/celect_course.php";

            while($result = mysqli_fetch_assoc($sql2)){
                
                echo $result['name_course'];    
                
            } ?></h3>
            <p class="block_eng_plus">	🌟 <?php 
            require "php/celect_course.php";

            while($result = mysqli_fetch_assoc($sql2)){
                
                echo $result['first_string'];    
                
            } ?></p>
            <p class="block_eng_plus">	🌟 <?php 
            require "php/celect_course.php";

            while($result = mysqli_fetch_assoc($sql2)){
                
                echo $result['second_string'];    
                
            } ?></p>
            <p class="block_eng_plus">	🌟 <?php 
            require "php/celect_course.php";

            while($result = mysqli_fetch_assoc($sql2)){
                
                echo $result['third_string'];    
                
            } ?></p>
            <p class="block_eng_time">&#8987; 20 уроков</p>
            <div class="block_eng_button">
            <a href="about_course/learnfromscratch.php">Узнать подробнее</a>
            
        </div>
        
        </div>
        <div class="block_eng">
            <p class="block_eng_right eco"><?php 
            require "php/celect_course.php";

            while($result = mysqli_fetch_assoc($sql3)){
                
                echo $result['prefix_course'];    
                
            } ?> ⌚</p>
            <h3><?php 
            require "php/celect_course.php";

            while($result = mysqli_fetch_assoc($sql3)){
                
                echo $result['name_course'];    
                
            } ?></h3>
            <p class="block_eng_plus">  🌟 <?php 
            require "php/celect_course.php";

            while($result = mysqli_fetch_assoc($sql3)){
                
                echo $result['first_string'];    
                
            } ?></p>
            <p class="block_eng_plus">	🌟 <?php 
            require "php/celect_course.php";

            while($result = mysqli_fetch_assoc($sql3)){
                
                echo $result['second_string'];    
                
            } ?></p>
            <p class="block_eng_plus">	🌟 <?php 
            require "php/celect_course.php";

            while($result = mysqli_fetch_assoc($sql3)){
                
                echo $result['third_string'];    
                
            } ?></p>
            <p class="block_eng_time">&#8987; 20 уроков</p>
            <div class="block_eng_button">
            <a onclick="course3()">Узнать подробнее</a>
        </div>
        </div>
        <div class="block_eng">
            <p class="block_eng_right"><?php 
            require "php/celect_course.php";

            while($result = mysqli_fetch_assoc($sql4)){
                
                echo $result['prefix_course'];    
                
            } ?> 🔥</p>
            <h3><?php 
            require "php/celect_course.php";

            while($result = mysqli_fetch_assoc($sql4)){
                
                echo $result['name_course'];    
                
            } ?></h3>
            <p class="block_eng_plus">	🌟 <?php 
            require "php/celect_course.php";

            while($result = mysqli_fetch_assoc($sql4)){
                
                echo $result['first_string'];    
                
            } ?></p>
            <p class="block_eng_plus">	🌟 <?php 
            require "php/celect_course.php";

            while($result = mysqli_fetch_assoc($sql4)){
                
                echo $result['second_string'];    
                
            } ?></p>
            <p class="block_eng_plus">	🌟 <?php 
            require "php/celect_course.php";

            while($result = mysqli_fetch_assoc($sql4)){
                
                echo $result['third_string'];    
                
            } ?></p>
            <p class="block_eng_time">&#8987; 20 уроков</p>
            <div class="block_eng_button" id="testcourse">
            <a href="about_course/сonversationalcourse.php">Узнать подробнее</a>
        </div>
        </div>
    </div>
</div>

<div class="block_test_course">
    <div class="text_test_course">
        <h1>Не можете определиться и выбрать свой курс ?</h1> <h4> Пройдите тестовый урок чтобы решить !</h4>
    </div>
    <div class="block_right_test_course">
        <div class="first-block_test_course">
            <h3>Консультация от спецаилиста</h3>
            <hr>
            <div class="second-block_img_text">
            <img src="img/Sparcle.svg" alt=""><p> Занимает не более 20-ти минут по времени</p>
            <img src="img/Sparcle.svg" alt=""><p> Бесплатная консультация</p>
        </div>
        <h2>Бесплатно</h2>
            <a ><button>Начать</button></a>
        </div>
        <div class="second-block_test_course">
            <h3>Тест для получения скидки на курс !</h3>
            <hr>
            <div class="second-block_img_text">
            <img src="img/Sparcle.svg" alt=""><p> После прохождения вы получите скидку !</p>
            <img src="img/Sparcle.svg" alt=""><p> Уровень для прохождения теста B2</p>
        </div>
            <h2>Бесплатно</h2>
            <button onclick="Freetest()">Начать</button>
        </div>
    </div>
</div>
<div class="block_info_lessons">
    <div class="block_left_lessons">
       
        <div class="info_img_lessons">
            <img src="img/img_lessons.png" alt="">
            <div class="info_text_lessons">
            <h2>Интерактивная платформа</h2>
            <p>Все в одном месте: занятия с преподавателем,
             упражнения и трекер прогресса</p>
        </div>
        </div>
    </div>
<div class="block_right_lessons">
   
    <div class="img_right_lessons">
        <img src="img/img_right_lessons.png" alt="">
        <div class="text_right_lessons">
        <h3>Мобильное приложение</h3>
           <p> Чтобы учить новые слова
             и тренировать грамматику когда угодно и где угодно</p>
    </div>
    </div>
</div>
</div>

<div class="block_bonus_form">
    <div class="left_block_bonus">
        <h2>Получите все актуальные новости о наших курсах!</h2>
        <p>Оставьте заявку на вводный урок сейчас и учитесь дешевле даже после завершения акции</p>
<div class="left_block_bonus_buttons">
<p>диагностика уровня бесплатно</p>
<p class="left_block_bonus_buttons second_child">персональный план</p>
</div>
</div>
<div class="right_block_bonus">
    <form action="php/reg.php" method="POST">
        <div class="right_block_bonus_text first_block">
        <input class="right_block_bonus_text-input" type="text" name="name" required placeholder="Имя">
    </div>
    <div class="right_block_bonus_text">
        <input class="right_block_bonus_text-input" type="email" name="email" required placeholder="Почта"></div>
        <div class="right_block_bonus_text">
        <input class="right_block_bonus_text-input" type="tel" data-tel-input required name="phone" placeholder="+7 (999) 999-99-99" id="phone-mask"></div>
        <div class="right_block_bonus_text checkbox_label">
        <input type="checkbox" class="custom-checkbox" id="happy" name="happy" value="yes" required><label for="happy">Даю согласие на обработу персональных данных</label></div>
        <div class="right_block_bonus_text_submit_button">
        <input type="submit" value="Войти"></div>
    </form>
</div>
</div>
<div class="container_circle_text bottom_block">
    <div class="circle_container media">
        <div class="circle_main">
            <div class="circle_text_container">
                <div class = "circle_text">
                   G
                </div>
            </div>
        </div>
    </div>
    <div class="list_container_a" id="login"><p>Global</p>
    <a>Правила акции</a>
    <a href="rules/offer.html" class="list_container_a-media">Оферта</a>
    <a href="privacy" class="list_container_a-media">Политика конфидециальности</a>
    <p>© Global, 2024</p>
    </div></div>
    <div id="support-chat">
	<div id="chat-header">
		<span>Support</span>
		<button id="close-chat">&times;</button>
	</div>
	<div id="chat-body">
		<div id="email-form">
			<input type="email" id="user-email" placeholder="Enter your email..." required />
			<button id="submit-email">Start Chat</button>
		</div>
		<div id="chat-messages" style="display: none;"></div>
		<div id="chat-input-container" style="display: none;">
			<input type="text" id="chat-input" placeholder="Type a message..." />
			<button id="send-message"><i class="fas fa-paper-plane"></i></button>
		</div>
	</div>
</div>
<div id="chat-icon">
	<i class="fas fa-comment-dots" style="margin: 0 auto;"></i>
</div>
<script>
    if ('scrollRestoration' in history) {
        history.scrollRestoration = 'manual';
    }
    
    window.addEventListener('beforeunload', () => {
        localStorage.setItem('scrollPosition', window.scrollY);
    });
    
    window.addEventListener('load', () => {
        const scrollPosition = localStorage.getItem('scrollPosition');
        if (scrollPosition) {
            window.scrollTo(0, parseInt(scrollPosition, 10));
        }
    });
    
    </script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://unpkg.com/imask"></script>
<script src="js/payment.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="jquery-3.7.1.min.js"></script>
<script src="js/test.js"></script>
</body>
</html>