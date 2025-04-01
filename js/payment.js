let cardNumInput =
  document.querySelector('#cardNum')

cardNumInput.addEventListener('keyup', () => {
  let cNumber = cardNumInput.value
  cNumber = cNumber.replace(/\s/g, "")

  if (Number(cNumber)) {
    cNumber = cNumber.match(/.{1,4}/g)
    cNumber = cNumber.join(" ")
    cardNumInput.value = cNumber
  }
})
window.addEventListener('beforeunload', function(event) {
  event.preventDefault();
  alert('Страница перезагружается!');
});
var count = 60;
// запущен таймер или нет

// запуск таймера по кнопке
document.addEventListener('DOMContentLoaded', () => {
  start();
});

function Reg_or_not()
{
  var Reg_or_not = localStorage.getItem('Reg_or_Not');
  if(Reg_or_not === null){
     Swal.fire({
      title: "Вы не вошли в аккаунт",
      icon: "error",
      draggable: true
    });
  }else{ 
    window.location.href = "../landing_eng/user.client/";
  }
}

function Reg_or_not2() {

  var Reg_or_not = localStorage.getItem('Reg_or_Not');
  if (Reg_or_not === null) {
      alert("Вы не вошли в аккаунт чтобы из него выйти");
  } else {
      alert("Вы вышли из аккаунта!");
      localStorage.removeItem('Reg_or_Not');

      // Отправляем запрос на сервер для завершения сессии
      fetch('../landing_eng/php/logoutforuser.php')
          .then(response => {
              if (response.ok) {
                  console.log("Сессия завершена");
                  window.location.href = "../landing_eng/";
              }
          })
          .catch(error => console.error("Ошибка:", error));
  }
}
function start() {

  // если таймер уже запущен — выходим из функции
  document.getElementById("timer").innerHTML ="Оставшееся время" + " " + "59" + ":" + "59";
  // запоминаем время нажатия
  var start_time = new Date();
  // получаем время окончания таймера
  var stop_time = start_time.setMinutes(start_time.getMinutes() + count);

  // запускаем ежесекундный отсчёт
  var countdown = setInterval(function () {
    // текущее время
    var now = new Date().getTime();
    // сколько времени осталось до конца таймера
    var remain = stop_time - now;
    // переводим миллисекунды в минуты и секунды
    var min = Math.floor((remain % (1000 * 60 * 60)) / (1000 * 60));
    var sec = Math.floor((remain % (1000 * 60)) / 1000);
    // если значение текущей секунды меньше 10, добавляем вначале ведущий ноль
    sec = sec < 10 ? "0" + sec : sec;
    // отправляем значение таймера на страницу в нужный раздел
    document.getElementById("timer").innerHTML ="Оставшееся время" + " "+ min + ":" + sec;
    // если время вышло
    if (remain < 0) {
      // останавливаем отсчёт
      clearInterval(countdown);
      alert("Время сессии истекло !");
      window.location.replace("index.php");
      // пишем текст вместо цифр
      document.getElementById("timer").innerHTML = "00:00";
    }
  }, 1000);
  // помечаем, что таймер уже запущен
  started = true;
}
costifnull = localStorage.getItem('cost');
if(costifnull === null){
  alert("Вы очистили кеш, повторите попытку");
  window.location.replace("index.php");
  localStorage.getItem('cost') = 0;
}
if(localStorage.getItem('discount')){
  discount = localStorage.getItem('discount');
  CostWithoutDiscount = localStorage.getItem('cost');

  FinalCost = CostWithoutDiscount-(CostWithoutDiscount*discount);
  document.getElementById("cost_course").innerHTML = "Оплатить: " + FinalCost + " ₽" + "<br>" + "Скидка: " + CostWithoutDiscount*discount +" ₽";
  document.getElementById("price").innerHTML = "руб: " + FinalCost + " ₽";


  
}else{
costifnull = localStorage.getItem('cost');
document.getElementById("cost_course").innerHTML = "Оплатить: " + localStorage.getItem('cost') + " ₽";
document.getElementById("price").innerHTML = "руб " + localStorage.getItem('cost') + " ₽";
url = new URL(window.location.href);
result = url.searchParams.get('transaction');
document.getElementById("numTransition").innerHTML = "Номер транзакиции: " + result;
title = localStorage.getItem('course_id');
title = parseInt(title,10);
var finaltital = document.getElementById("finaltitle");
switch (title){
  case 1:
    finaltital.innerHTML = "Курс - Разговорный курс";
    break;
  case 2:
    finaltital.innerHTML = "Курс - Научитья с нуля";
    break;
  case 3:
    finaltital.innerHTML = "Курс - Уровень носителя";
    break;
  case 4:
    finaltital.innerHTML = "Курс - Подготовка экзамена";
    break;
    default:
      finaltital.innerHTML = "Курс - Неизвестный курс"; // Обработка случая, если title не соответствует ни одному из кейсов
      break;
}
}
function course1(){
  result = '';
  for (let i = 0; i < 14; i++) {
    result += Math.floor(Math.random() * 10); // Генерация случайной цифры от 0 до 9
  }
  localStorage.setItem('cost',2500);
  localStorage.setItem('course_id',1);
  window.location.href = `../payment.php?transaction=${result}`;
}
function course2(){
  result = '';
  for (let i = 0; i < 14; i++) {
    result += Math.floor(Math.random() * 10); // Генерация случайной цифры от 0 до 9
  }
  localStorage.setItem('cost',2500);
  localStorage.setItem('course_id',2);
  window.location.href = `../payment.php?transaction=${result}`;
}
function course3(){
  result = '';
  for (let i = 0; i < 14; i++) {
    result += Math.floor(Math.random() * 10); // Генерация случайной цифры от 0 до 9
  }
  localStorage.setItem('cost',2500);
  localStorage.setItem('course_id',3);
  window.location.href = `../payment.php?transaction=${result}`;
}
function course4(){
  result = '';
  for (let i = 0; i < 14; i++) {
    result += Math.floor(Math.random() * 10); // Генерация случайной цифры от 0 до 9
  }
  localStorage.setItem('cost',3000);
  localStorage.setItem('course_id',4);
  window.location.href = `../payment.php?transaction=${result}`;
}
function closeSess(){
  Swal.fire({
    title: "Вы уверены?",
    text: "Завершая сессию вы прервете покупку!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Отменить покупку",
    cancelButtonText : "Назад"
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.replace("index_loged.php");
      localStorage.getItem('cost') = 0;
    }
  });
}
