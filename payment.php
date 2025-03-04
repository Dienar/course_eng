<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Оплата заказа</title>
	<link rel="stylesheet" href="css/payment.css">
</head>

<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #eef5e1;
			margin: 0;
			padding: 0;
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100vh;
		}

		.container {
			display: flex;
			background: white;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
			width: 800px;
		}

		.left-panel,
		.right-panel {
			flex: 1;
			padding: 20px;
		}

		.left-panel {
			
			border-radius: 10px;
			padding: 20px;
			text-align: center;
		}

		.left-panel img {
			width: 100px;
			height: 100px;
			margin: 10px 0;
		}

		.title {
			font-size: 18px;
			font-weight: bold;
		}

		.price {
			font-size: 24px;
			color: #4CAF50;
			margin: 10px 0;
		}

		input {
			width: 100%;
			padding: 10px;
			margin: 5px 0;
			border: 1px solid #ccc;
			border-radius: 5px;
		}

		.pay-btn {
			width: 100%;
			padding: 10px;
			background-color: #00264D;
			color: white;
			border: none;
			border-radius: 5px;
			cursor: pointer;
		}

		.pay-btn:hover {
			background-color: #001a33;
		}

		.switch {
			display: flex;
			align-items: center;
			margin: 10px 0;
		}

		.switch input {
			width: auto;
			margin-right: 10px;
		}

		.right-panel {
			text-align: center;
		}
    .flag{
      color:white;
    }
		.flag {
			display: flex;
			align-items: center;
			justify-content: center;
			margin-bottom: 10px;
      background-color:#00264D;
      margin: 0 auto;
      padding:0.3em;
      border-radius:8px;
      width:7em
		}

		.flag img {
			width: 30px;
			height: auto;
			margin-right: 10px;
		}
    .card-payment-method img{
      width:2em;
      display:flex;
    }
    .card-payment-method{
      margin: 0 auto;
      text-align:center;
    }
		.payment-method {
			border: 1px solid black;

      width:100px;			
      padding: 10px;
			border-radius: 5px;
		display: flex;
		flex-direction: column;
		align-items: center;
		justify-content: center;
			margin-bottom: 15px;
      margin:0 auto;
		}

		.timer {
			font-size: 14px;
			color: red;
			margin-bottom: 10px;
		}
	.separator {
	width: 1.5px;
	background-color: lightgray;
	position: absolute;
	top:20%;
	bottom: 20%;
	left: 50%;
	transform: translateX(-50%);
	}
	</style>
</head>

<body>
	<div class="container">
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
			<input type="text" id="expiration" name="expiration" placeholder="MM/YY" maxlength="5" required pattern="(0[1-9]|1[0-2])\/\d{2}" required>
			<input type="password" id="cvv" name="cvv" maxlength="3" placeholder="CVV" required>
			<div class="switch">
				<input type="checkbox" checked> Сохранить карту для будущих платежей в этом браузере
            </div>
				<button class="pay-btn" type="submit" id="cost_course"></button>
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
