let userEmail = "";

document.getElementById("chat-icon").addEventListener("click", function () {
    document.getElementById("support-chat").style.display = "flex";
    this.style.display = "none";
});
document.getElementById("close-chat").addEventListener("click", function () {
    document.getElementById("support-chat").style.display = "none";
    document.getElementById("chat-icon").style.display = "flex";
});

document.getElementById("submit-email").addEventListener("click", function () {
    const emailInput = document.getElementById("user-email");
    userEmail = emailInput.value.trim();

    if (userEmail && validateEmail(userEmail)) {
        emailInput.style.display = "none";
        document.getElementById("submit-email").style.display = "none";
        document.getElementById("chat-messages").style.display = "block";
        document.getElementById("chat-input-container").style.display = "flex";

        showBotMessage("Здравствуйте, опишите свою проблему.");
    } else {
        alert("Пожалуйста, введите корректный email.");
    }
});

document.getElementById("send-message").addEventListener("click", sendMessage);
document.getElementById("chat-input").addEventListener("keypress", function (e) {
    if (e.key === "Enter") sendMessage();
});

function sendMessage() {
    const input = document.getElementById("chat-input");
    const message = input.value.trim();

    if (message) {
        saveMessage(userEmail, message, (response) => {
            if (response.status === "error") {
                showErrorMessage(response.message);
            } else {
                showUserMessage(message);
                input.value = ""; // Очистка поля ввода

                setTimeout(() => {
                    showBotMessage("Мы скоро с вами свяжемся!");
                }, 1000);
            }
        });
    }
}

function showUserMessage(message) {
    const chatMessages = document.getElementById("chat-messages");

    const userMessage = document.createElement("div");
    userMessage.textContent = "Вы: " + message;
    userMessage.style.cssText = "background: #007bff; color: white; padding: 8px; margin: 5px 0; border-radius: 5px; text-align: right;";
    chatMessages.appendChild(userMessage);
    chatMessages.scrollTop = chatMessages.scrollHeight;
}

function showBotMessage(message) {
    const chatMessages = document.getElementById("chat-messages");

    const botMessage = document.createElement("div");
    botMessage.textContent = "Супермен: " + message;
    botMessage.style.cssText = "background: #eee; padding: 8px; margin: 5px 0; border-radius: 5px;";
    chatMessages.appendChild(botMessage);
    chatMessages.scrollTop = chatMessages.scrollHeight;
}

function showErrorMessage(message) {
    const chatMessages = document.getElementById("chat-messages");

    const errorMessage = document.createElement("div");
    errorMessage.textContent = message;
    errorMessage.style.cssText = "color: red; padding: 8px; margin: 5px 0; border-radius: 5px; text-align: center;";
    chatMessages.appendChild(errorMessage);

    setTimeout(() => errorMessage.remove(), 3000); // Ошибка исчезает через 3 секунды
}

function validateEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

function saveMessage(email, message, callback) {
    fetch("../landing_eng/php/save_message.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({ email, message }),
    })
    .then(response => response.json())
    .then(data => callback(data))
    .catch(error => console.error("Ошибка:", error));
}
IMask(
  document.getElementById('phone-mask'),
  {
    mask: '+{7} (000) 000-00-00'
  }
)
$('#phone-mask').on('input', function() {
  $(this).val($(this).val().replace(/[A-Za-zА-Яа-яЁё]/, ''))
});
function Freetest(){
Swal.fire({
position: "center",
title: "У вас будет только 1 попытка, начинаем?",
icon: "question",
showCancelButton: true,
confirmButtonColor: "#3085d6",
cancelButtonColor: "#d33",
confirmButtonText: "let`s go!",
cancelButtonText : "litle later"
}).then((result) => {
if (result.isConfirmed) {
window.location.replace("test_free.html");  
}
});
};
document.addEventListener('DOMContentLoaded', function () {
    const menuIcon = document.getElementById('menu-icon');
    const navMenu = document.getElementById('nav-menu');

    menuIcon.addEventListener('click', function () {
        navMenu.classList.toggle('active');
    });
});
