document.addEventListener("DOMContentLoaded", function () {
    const progressBar = document.getElementById("testProgress");
    const saveButton = document.getElementById("saveProgress");

    function updateProgressBar(progress) {
        progressBar.style.width = progress + "%";
        console.log("Updated progress bar:", progress + "%");
    }

    function saveProgress(progress) {
        fetch("../php/progress.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: `progress=${progress}`
        }).then(response => response.json())
          .then(data => {
              console.log("Progress saved:", data.progress); // Проверяем, что сохраняется
              updateProgressBar(data.progress);
          })
          .catch(error => console.error("Error saving progress:", error));
    }

    function loadProgress() {
        fetch("../php/progress.php")
            .then(response => response.json())
            .then(data => {
                console.log("Loaded progress:", data.progress); // Проверяем, что загружается
                updateProgressBar(data.progress);
            })
            .catch(error => console.error("Error loading progress:", error));
    }

    saveButton.addEventListener("click", function () {
        let progress = calculateProgress();
        console.log("Calculated progress:", progress); // Проверяем расчёт прогресса
        updateProgressBar(progress);
        saveProgress(progress);
    });

    function calculateProgress() {
        let totalQuestions = 20; // Явно указываем общее количество вопросов
        let answeredQuestions = 0;
    
        // Проверяем текстовые и числовые поля
        document.querySelectorAll("input[type='text'], textarea, select").forEach(field => {
            if (field.value.trim() !== "") {
                answeredQuestions++;
            }
        });
    
        // Проверяем радиокнопки (по группам)
        let radioGroups = new Set();
        document.querySelectorAll("input[type='radio']:checked").forEach(radio => {
            radioGroups.add(radio.name);
        });
        answeredQuestions += radioGroups.size;
    
        // Проверяем чекбоксы (если хотя бы один в группе отмечен - засчитываем вопрос)
        let checkboxGroups = new Map();
        document.querySelectorAll("input[type='checkbox']").forEach(checkbox => {
            let name = checkbox.name;
            if (!checkboxGroups.has(name)) {
                checkboxGroups.set(name, false);
            }
            if (checkbox.checked) {
                checkboxGroups.set(name, true);
            }
        });
    
        checkboxGroups.forEach(value => {
            if (value) answeredQuestions++;
        });
    
        // Вычисляем процент
        let progress = Math.round((answeredQuestions / totalQuestions) * 100);
        console.log(`Total: ${totalQuestions}, Answered: ${answeredQuestions}, Progress: ${progress}%`);
        return progress;
    }
    loadProgress();
})    
