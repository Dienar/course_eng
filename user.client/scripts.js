document.addEventListener("DOMContentLoaded", function () {
        const menuIcon = document.getElementById('menu-icon');
        const navMenu = document.getElementById('nav-menu');
    
        menuIcon.addEventListener('click', function () {
            navMenu.classList.toggle('active'); // Добавляем или удаляем класс active
        });
        const menuIcon2 = document.getElementById('menu-icon2');
        const navMenu2 = document.getElementById('nav-menu');
    
        menuIcon2.addEventListener('click', function () {
            navMenu2.classList.toggle('active'); // Добавляем или удаляем класс active
        });
    function loadProgress(courseId) {
        let progressText = document.getElementById(`userProg${courseId}`);
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
                    progressText.innerHTML = data.progress + "%";
                }
            })
            .catch(error => console.error("Error loading progress:", error));
    }

    // Список всех курсов
    const courses = [1, 2, 3, 4];

    // Загружаем прогресс для каждого курса
    courses.forEach(courseId => loadProgress(courseId));

});



