document.addEventListener("DOMContentLoaded", function () {
    function loadProgress(courseId) {
        let progressBar = document.getElementById(`userProgress${courseId}`);
        if (!progressBar) {
            console.error("Progress bar element not found for course:", courseId);
            return;
        }

        fetch(`../php/progress.php?course_id=${courseId}`)
            .then(response => response.json())
            .then(data => {
                if (data.progress !== undefined) {
                    progressBar.style.width = data.progress + "%";
                }
            })
            .catch(error => console.error("Error loading progress:", error));
    }

    // Список всех курсов
    const courses = [1, 2, 3, 4];

    // Загружаем прогресс для каждого курса
    courses.forEach(courseId => loadProgress(courseId));
});
