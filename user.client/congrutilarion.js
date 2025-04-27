// Функция для показа поздравления
function showCourseCongrats(courseId) {
    // Проверяем, было ли уже показано это поздравление
    if (sessionStorage.getItem('congratsShown_' + courseId)) {
        return;
    }
    
    // Помечаем как показанное
    sessionStorage.setItem('congratsShown_' + courseId, 'true');
    
    let popup = document.getElementById('congratsPopup');
    
    if(!popup) {
        popup = document.createElement('div');
        popup.id = 'congratsPopup';
        popup.className = 'congrats-popup';
        popup.innerHTML = `
            <div class="congrats-content">
                <span class="close-popup">&times;</span>
                <h2>🎉 Поздравляем! 🎉</h2>
                <p>Вы успешно завершили курс ${courseId}!</p>
                <div class="confetti"></div>
                <button class="btn primary close-btn">Продолжить обучение</button>
            </div>
        `;
        document.body.appendChild(popup);
    }
    
    popup.style.display = 'flex';
    
    if(typeof confetti === 'function') {
        confetti({
            particleCount: 150,
            spread: 70,
            origin: { y: 0.6 }
        });
    }
    
    const closeElements = popup.querySelectorAll('.close-popup, .close-btn');
    closeElements.forEach(el => {
        el.addEventListener('click', () => {
            popup.style.display = 'none';
            clearCourseSession();
        });
    });
    
    popup.addEventListener('click', (e) => {
        if(e.target === popup) {
            popup.style.display = 'none';
            clearCourseSession();
        }
    });
}

// Функция для очистки сессии
function clearCourseSession() {
    fetch('clear_course_session.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        }
    }).catch(error => console.error('Error:', error));
}

// Проверяем при загрузке страницы
document.addEventListener('DOMContentLoaded', function() {
    // Проверяем localStorage только если нет отметки в sessionStorage
    const completedCourse = localStorage.getItem('completedCourse');
    if(completedCourse && !sessionStorage.getItem('congratsShown_' + completedCourse)) {
        showCourseCongrats(completedCourse);
        localStorage.removeItem('completedCourse');
    }
});