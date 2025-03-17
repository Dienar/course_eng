<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Оплата заказа</title>
	<link rel="stylesheet" href="css/payment.css">
</head>

<body>
	<div class="container">
		<a class="closeSess" onclick="closeSess()">< назад</a>
		<div class="left-panel">
			<div class="title">EngPay RU</div>
			<p>Описание продукта</p>
			<div class="title" id="finaltitle"></div>
			<img src="img/payment.png" alt="Product Image">
			<div class="price" id="price">руб 202,86</div>
			<p id="numTransition">Номер транзакции:</p>
		</div>
	<div class="separator"></div>
		<div class="right-panel">
			<div class="timer" id="timer"></div>
			<div class="flag">
				<img src="https://upload.wikimedia.org/wikipedia/en/thumb/f/f3/Flag_of_Russia.svg/120px-Flag_of_Russia.svg.png" alt="Russia Flag">
				<span>Russia</span>
			</div>
      <div class="card-payment-method">
			<p>Выберите способ оплаты</p>
			<div class="payment-method">
		<img src="https://cdn-icons-png.flaticon.com/128/657/657076.png">
    <p>Карта</p></div>
      </div>
			<p>Оплата через Карту</p>
      <form action="php/payment.php?" method="POST">
			<input type="text" name="name" placeholder="Полное имя на карте" required>
			<input type="email" name="email" placeholder="Эллектронная почта" required>
			<input type="text" name="cartnum" id="cardNum" maxlength="19" placeholder="0000 0000 0000 0000" required>
			<div class="mmyy_cvv-box">
			<input type="text" id="expiration" name="expiration" placeholder="MM/YY" maxlength="5" required pattern="(0[1-9]|1[0-2])\/\d{2}" required>
			<input type="password" id="cvv" name="cvv" maxlength="3" placeholder="CVV" required style="margin-left: 5px;">
		</div>
			<div class="switch_text-box">
			<label class="switch">
  <input type="checkbox">
  <span class="slider"></span>
</label> <p style="margin: auto;">Сохранить карту для других покупок</p></div>
            
				<button class="pay-btn" type="submit" id="cost_course">возврат в меню</button>
        </form>
			</div>
		</div>

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="jquery-3.7.1.min.js"></script>
	<script src="js/mask.js" data-autoinit="true"></script>
	<script type="text/javascript" src="js/payment.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
  <script>
document.addEventListener("DOMContentLoaded", function() {
    document.querySelector("form").addEventListener("submit", function(event) {
        let courseId = localStorage.getItem("course_id");
        if (courseId) {
            let hiddenInput = document.createElement("input");
            hiddenInput.type = "hidden";
            hiddenInput.name = "course_id";
            hiddenInput.value = courseId;
            this.appendChild(hiddenInput);
        } else {
            console.log("course_id не найден в localStorage");
        }
    });
});
</script>
<script>
  $(document).ready(function(){
    $('#expiration').mask('00/00');
  });
</script>
</body>

</html>
