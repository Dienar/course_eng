<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Оплата заказа</title>
	<link rel="stylesheet" href="css/payment.css">
</head>

<body>
	<div class="payment-container">
		<div class="payment-box">
			<h3 id="cost_course" class="cost-summary"></h3>
			<form action="php/payment.php" method="post" class="payment-form">
				<div class="payment-header">
					<h2>Оплата заказа</h2>
				</div>

				<div class="input-group">
					<label for="name">Ф.И.О.</label>
					<input type="text" id="name" name="name" placeholder="Введите полное имя" required>
        </div>

					<div class="input-group">
						<label for="email">Email</label>
						<input type="email" id="email" name="email" placeholder="Введите email" required>
        </div>

						<div class="input-group">
							<label for="city">Город</label>
							<input type="text" id="city" name="city" placeholder="Введите город" required>
        </div>

							<div class="input-group">
								<label for="zip">Индекс</label>
								<input type="number" id="zip" name="index_user" placeholder="123456" required>
        </div>

								<div class="payment-method">
									<h3>Оплата картой</h3>

									<div class="input-group">
										<label for="cardName">Имя на карте</label>
										<input type="text" id="cardName" name="nameoncart" placeholder="Введите имя на карте" required>
          </div>

										<div class="input-group">
											<label for="cardNum">Номер карты</label>
											<input type="text" id="cardNum" name="cartnum" placeholder="1111 2222 3333 4444" maxlength="19" required>
          </div>

											<div class="input-group-flex">
                      <div class="input-group">
  <label for="expiration">Срок действия</label>
  <input type="text" id="expiration" name="expiration" placeholder="MM/YY" maxlength="5" required pattern="(0[1-9]|1[0-2])\/\d{2}" title="Введите дату в формате MM/YY">
</div>
													<div class="input-group">
														<label for="cvv">CVV</label>
														<input type="password" id="cvv" name="cvv" maxlength="3" required>
            </div>
													</div>
												</div>

												<div class="form-actions">
													<input type="submit" value="Перейти к оплате" class="submit-btn">
													<button type="button" onclick="closeSess()" class="cancel-btn">Закрыть сессию</button>
												</div>
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