<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Online Payment-Page</title>
  <link rel="stylesheet" href="css/payment.css">
</head>
<body>
  <div class="container"><h3 id="cost_course"></h3>
    <form action="#">
      <div class="row">
        <div class="col">
          <h3 class="title">
            Оплата заказа
          </h3>
          <div class="inputBox">
            <label for="name">
                          Полное имя:
                          </label>
            <input type="text" id="name"
                               placeholder="Enter your full name"
                               required>
                    </div>
            <div class="inputBox">
              <label for="email">
                              Email:
                          </label>
              <input type="text" id="email"
                               placeholder="Enter email address"
                               required>
                    </div>
                <div class="inputBox">
                  <label for="city">
                              Город:
                          </label>
                  <input type="text" id="city"
                               placeholder="Enter city"
                               required>
                    </div>
                  <div class="flex">
                      <div class="inputBox">
                        <label for="zip">
                                  Индекс:
                              </label>
                        <input type="number" id="zip"
                                   placeholder="123 456"
                                   required>
                        </div>
                      </div>
                    </div>
                    <div class="col">
                    <div class="time_block"><label>Окончание сессии: </label>
                    <p>
	            <div id="timer"></div></div>
                </p>
                      <h3 class="title">Payment</h3>
                      <div class="inputBox">
                        <label for="name">
                              Одобренные карты:
                          </label>
                        <img src="img/payment__photo.webp" alt="credit/debit card image">
                    </div>
                        <div class="inputBox">
                          <label for="cardName">
                              Имя:
                          </label>
                          <input type="text" id="cardName"
                               placeholder="Enter card name"
                               required>
                    </div>
                          <div class="inputBox">
                            <label for="cardNum">
                              Номер карты:
                          </label>
                            <input type="text" id="cardNum"
                               placeholder="1111-2222-3333-4444"
                               maxlength="19" required>
                    </div>
                            <div class="flex">
                              <div class="inputBox">
                                <label for="">Месяц/Год:</label>
                                <input id="expiration" type="tel" placeholder="MM/YY" class="masked" pattern="(1[0-2]|0[1-9])\/\d\d" data-valid-example="11/18" title="2-digit month and 2-digit year greater than 01/24">
                              </div>
                              <div class="inputBox">
                                <label for="cvv">CVV</label>
                                <input type="password" id="cvv"
                                    oninput="this.value = this.value.slice(0, 3)" required>
                        </div>
                              </div>
                            </div>
                          </div>
                          <input type="submit" value="Proceed to Checkout"
                   class="submit_btn">
        </form>
                        </div>
                        <script src="jquery-3.7.1.min.js"></script>
                        <script src="js/mask.js" data-autoinit="true"></script>
                        <script type="text/javascript" src="js/payment.js"></script>
</html>
