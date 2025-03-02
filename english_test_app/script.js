document.addEventListener("DOMContentLoaded", function () {
    const progressBar = document.getElementById("testProgress");
    const saveButton = document.getElementById("saveProgress");
    const exitButton = document.getElementById("exit");

    function updateProgressBar(progress) {
        progressBar.style.width = progress + "%";
        console.log("Updated progress bar:", progress + "%");
    }

    function saveProgress(progress, answers) {
        fetch("../php/progress.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: `progress=${progress}&answers=${encodeURIComponent(JSON.stringify(answers))}`
        }).then(response => response.json())
          .then(data => {
              console.log("Progress saved:", data.progress);
              updateProgressBar(data.progress);
          })
          .catch(error => console.error("Error saving progress:", error));
    }

    function loadProgress() {
        fetch("../php/progress.php")
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
