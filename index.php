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
    <a href="#login" > Profile</a> 
        <a href="" id="exit" onclick="Reg_or_not2()">Exit</a>
       
</div>
<div class="list_container">
    <a href="#testcourse">Тестовый курс</a>
    <a href="#usercourse">Курсы</a>
    <a href="#helpinput"id="show-chat">Помощь</a>
    <a href="#login">О нас</a>
</div>
<div class="register_container media" ><a href="#login" ><i class="fa-solid fa-user-tie"></i> Profile</a> 
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
    <button type="submit" class="text_container_start_bold__input__img"><a href="#login">➤</a></button>
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
            <a href="#login">Узнать подробнее</a>
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
            <a href="#login">Узнать подробнее</a>
            
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
            <a href="#login">Узнать подробнее</a>
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
            <a href="#login">Узнать подробнее</a>
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
<footer class="dark-footer">
  <div class="footer-container">
    <div class="footer-logo-col">
      <div class="logo-circle">
        <span class="logo-letter">G</span>
      </div>
      <p class="logo-slogan">Образовательная платформа</p>
      <div class="social-links">
        <a href="#" aria-label="Telegram">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#A0AEC0" stroke-width="1.5"/>
            <path d="M8.5 12.5L10.5 14.5L15.5 9.5" stroke="#A0AEC0" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </a>
        <a href="#" aria-label="VK">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#A0AEC0" stroke-width="1.5"/>
            <path d="M13 7H15.5L16 12H13V16H11V12H8V10.5C8 9.67157 8.67157 9 9.5 9H11V7H12C12.5523 7 13 7.44772 13 8V7Z" fill="#A0AEC0"/>
          </svg>
        </a>
        <a href="#" aria-label="YouTube">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#A0AEC0" stroke-width="1.5"/>
            <path d="M10 15L15 12L10 9V15Z" fill="#A0AEC0"/>
          </svg>
        </a>
      </div>
    </div>

    <div class="footer-links-col">
      <h3 class="links-title">Навигация</h3>
      <ul class="footer-links">
        <li><a href="#">Главная</a></li>
        <li><a href="#">Курсы</a></li>
        <li><a href="#">Преподаватели</a></li>
        <li><a href="#">Отзывы</a></li>
        <li><a href="#">Контакты</a></li>
      </ul>
    </div>

    <div class="footer-contacts-col">
      <h3 class="links-title">Контакты</h3>
      <ul class="footer-contacts">
        <li>
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M21 10C21 17 12 23 12 23C12 23 3 17 3 10C3 7.61305 3.94821 5.32387 5.63604 3.63604C7.32387 1.94821 9.61305 1 12 1C14.3869 1 16.6761 1.94821 18.364 3.63604C20.0518 5.32387 21 7.61305 21 10Z" stroke="#A0AEC0" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M12 13C13.6569 13 15 11.6569 15 10C15 8.34315 13.6569 7 12 7C10.3431 7 9 8.34315 9 10C9 11.6569 10.3431 13 12 13Z" stroke="#A0AEC0" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          Москва, ул. Образцова, 14
        </li>
        <li>
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M22 16.92V19.92C22.001 20.198 21.944 20.473 21.833 20.728C21.722 20.983 21.559 21.212 21.354 21.4C21.149 21.588 20.908 21.731 20.645 21.819C20.383 21.907 20.106 21.938 19.83 21.91C16.743 21.573 13.726 20.683 10.92 19.28C8.261 17.972 5.863 16.156 3.85 13.93C1.833 11.704 0.261 9.125 -0.8 6.32C-0.918 5.974 -0.899 5.597 -0.746 5.262C-0.593 4.927 -0.315 4.657 0.04 4.5L3.16 3.07C3.631 2.871 4.168 2.956 4.56 3.29C5.34 3.956 6.178 4.549 7.06 5.06C7.471 5.321 7.706 5.781 7.67 6.26L7.42 9.25C7.399 9.628 7.586 9.983 7.91 10.18C9.065 10.862 10.307 11.377 11.6 11.71C11.918 11.8 12.27 11.734 12.53 11.53L14.87 9.71C15.321 9.37 15.921 9.34 16.4 9.63C17.288 10.132 18.132 10.715 18.92 11.37C19.292 11.681 19.386 12.205 19.15 12.62L17.67 15.54C17.436 15.948 17.007 16.209 16.54 16.23L13.63 16.38C13.232 16.398 12.861 16.6 12.63 16.93C12.216 17.5 11.716 18.007 11.15 18.43C10.806 18.685 10.669 19.133 10.8 19.55" stroke="#A0AEC0" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          +7 (495) 123-45-67
        </li>
        <li>
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M4 4H20C21.1 4 22 4.9 22 6V18C22 19.1 21.1 20 20 20H4C2.9 20 2 19.1 2 18V6C2 4.9 2.9 4 4 4Z" stroke="#A0AEC0" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M22 6L12 13L2 6" stroke="#A0AEC0" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
          info@gexample.com
        </li>
      </ul>
    </div>
  </div>

  <div class="footer-bottom">
    <div class="footer-legal">
      <span>© 2023 Образовательная платформа G. Все права защищены.</span>
      <div class="legal-links">
        <a href="#">Публичная оферта</a>
        <span>•</span>
        <a href="#">Политика конфиденциальности</a>
      </div>
    </div>
  </div>
</footer>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://unpkg.com/imask"></script>
<script src="js/payment.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="jquery-3.7.1.min.js"></script>
<script src="js/test.js"></script>
</body>
</html>