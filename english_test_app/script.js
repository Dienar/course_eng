document.addEventListener("DOMContentLoaded", function () {
    const showAnswerButtons = document.querySelectorAll('.show-answer-btn');

    // Добавляем обработчик события для каждой кнопки
    showAnswerButtons.forEach(button => {
        button.addEventListener('click', function () {
            // Получаем номер вопроса из атрибута data-question
            const questionId = button.getAttribute('data-question');
            // Находим блок с ответом по ID
            const answerBlock = document.getElementById(`answer${questionId}`);

            // Переключаем видимость блока с ответом
            if (answerBlock.style.display === 'none' || answerBlock.style.display === '') {
                answerBlock.style.display = 'block';
                button.textContent = 'Скрыть ответ';
            } else {
                answerBlock.style.display = 'none';
                button.textContent = 'Показать ответ';
            }
        });
    });
    const progressBar = document.getElementById("testProgress");
    const saveButton = document.getElementById("saveProgress");
    const exitButton = document.getElementById("exit");

    // Получаем идентификатор курса из URL
    const url = new URL(window.location.href);
    const selectCourse = url.searchParams.get("selectcourse");
    const courseId = parseInt(selectCourse, 10);

    // Сохраняем идентификатор курса в localStorage
    localStorage.setItem("selectcourse", courseId);

    function updateProgressBar(progress) {
        progressBar.style.width = progress + "%";
        console.log("Updated progress bar:", progress + "%");
    }

    function saveProgress(progress, answers) {
        fetch("../php/progress.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: `course_id=${courseId}&progress=${progress}&answers=${encodeURIComponent(JSON.stringify(answers))}`
        }).then(response => response.json())
          .then(data => {
              console.log("Progress saved:", data.progress);
              updateProgressBar(data.progress);
          })
          .catch(error => console.error("Error saving progress:", error));
    }

    function loadProgress() {
        fetch(`../php/progress.php?course_id=${courseId}`)
            .then(response => response.json())
            .then(data => {
                console.log("Loaded progress:", data);
                updateProgressBar(data.progress);
                restoreAnswers(data.answers);
            })
            .catch(error => console.error("Error loading progress:", error));
    }

    function restoreAnswers(answers) {
        if (!answers) return;
    
        try {
            answers = JSON.parse(answers); // Декодируем JSON, если он в строке
        } catch (error) {
            console.error("Error parsing answers JSON:", error);
            return;
        }
    
        Object.keys(answers).forEach(name => {
            let elements = document.getElementsByName(name);
            if (!elements.length) return; // Если нет элементов с таким name, пропускаем
    
            elements.forEach(element => {
                if (element.type === "checkbox" || element.type === "radio") {
                    // Если элемент чекбокс или радио и его значение есть в ответах — выбираем его
                    if (Array.isArray(answers[name])) {
                        element.checked = answers[name].includes(element.value);
                    } else {
                        element.checked = element.value === answers[name];
                    }
                } else {
                    element.value = answers[name]; // Для текстовых полей и select
                }
            });
        });
    }
    
    function collectAnswers() {
        let answers = {};

        // Текстовые поля, textarea и select
        document.querySelectorAll("input[type='text'], textarea, select").forEach(field => {
            answers[field.name] = field.value;
        });

        // Радиокнопки
        document.querySelectorAll("input[type='radio']:checked").forEach(radio => {
            answers[radio.name] = radio.value;
        });

        // Чекбоксы
        document.querySelectorAll("input[type='checkbox']").forEach(checkbox => {
            if (!answers[checkbox.name]) {
                answers[checkbox.name] = [];
            }
            if (checkbox.checked) {
                answers[checkbox.name].push(checkbox.value);
            }
        });

        return answers;
    }

    function calculateProgress() {
        let totalQuestions = 20;
        let answeredQuestions = 0;

        let answers = collectAnswers();
        Object.keys(answers).forEach(key => {
            if (Array.isArray(answers[key]) && answers[key].length > 0) {
                answeredQuestions++;
            } else if (answers[key]) {
                answeredQuestions++;
            }
        });

        let progress = Math.round((answeredQuestions / totalQuestions) * 100);
        console.log(`Total: ${totalQuestions}, Answered: ${answeredQuestions}, Progress: ${progress}%`);
        return { progress, answers };
    }

    saveButton.addEventListener("click", function () {
        let { progress, answers } = calculateProgress();
        updateProgressBar(progress);
        saveProgress(progress, answers);
    });

    exitButton.addEventListener("click", function () {
        let { progress, answers } = calculateProgress();
        saveProgress(progress, answers);
        window.location.replace("../user.client");
    });

    loadProgress();
});