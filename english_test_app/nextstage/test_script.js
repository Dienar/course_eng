document.addEventListener('DOMContentLoaded', function() {
    const audioPlayer = document.getElementById('testAudio');
    const playBtn = document.querySelector('.play-btn');
    const repeatBtn = document.querySelector('.repeat-btn');
    const sections = document.querySelectorAll('.test-section');
    const nextBtn = document.querySelector('.next-btn');
    const prevBtn = document.querySelector('.prev-btn');
    const submitBtn = document.querySelector('.submit-btn');
    const progressFill = document.querySelector('.progress-fill');
    let currentSection = 0;

    // Аудиоплеер
    playBtn.addEventListener('click', function() {
        if (audioPlayer.paused) {
            audioPlayer.play();
            playBtn.textContent = '⏸️ Пауза';
        } else {
            audioPlayer.pause();
            playBtn.textContent = '▶️ Проиграть';
        }
    });

    repeatBtn.addEventListener('click', function() {
        audioPlayer.currentTime = 0;
        audioPlayer.play();
        playBtn.textContent = '⏸️ Пауза';
    });

    // Навигация по секциям
    function showSection(index) {
        sections.forEach((section, i) => {
            section.classList.toggle('active', i === index);
        });

        prevBtn.disabled = index === 0;
        nextBtn.classList.toggle('hidden', index === sections.length - 1);
        submitBtn.classList.toggle('hidden', index !== sections.length - 1);

        // Обновление прогресс-бара
        const progress = ((index + 1) / sections.length) * 100;
        progressFill.style.width = `${progress}%`;
    }

    nextBtn.addEventListener('click', function() {
        if (currentSection < sections.length - 1) {
            currentSection++;
            showSection(currentSection);
        }
    });

    prevBtn.addEventListener('click', function() {
        if (currentSection > 0) {
            currentSection--;
            showSection(currentSection);
        }
    });

    submitBtn.addEventListener('click', function() {
        // Отправка результатов на сервер
        alert('Тест завершен! Результаты отправлены.');
        // window.location.href = 'next_page.php';
    });

    // Инициализация
    showSection(0);
});