
document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("loadProgress").addEventListener("click", function () {
        for (let i = 1; i <= 20; i++) {
            if (localStorage.getItem("q" + i)) {
                let element = document.getElementById("q" + i);
                if (element) {
                    element.value = localStorage.getItem("q" + i);
                } else {
                    let radios = document.querySelectorAll('input[name="q' + i + '"]');
                    radios.forEach(radio => {
                        if (radio.value === localStorage.getItem("q" + i)) {
                            radio.checked = true;
                        }
                    });
                }
            }
        }
    });

    document.getElementById("saveProgress").addEventListener("click", function () {
        for (let i = 1; i <= 20; i++) {
            let element = document.getElementById("q" + i);
            if (element) {
                localStorage.setItem("q" + i, element.value);
            } else {
                let selected = document.querySelector('input[name="q' + i + '"]:checked');
                if (selected) {
                    localStorage.setItem("q" + i, selected.value);
                }
            }
        }
        alert("Progress saved!");
    });

    document.getElementById("checkButton").addEventListener("click", function () {
        let score = 0;
        for (let i = 1; i <= 20; i++) {
            if (document.getElementById("q" + i) && document.getElementById("q" + i).value.toLowerCase() === "correct") {
                score++;
            } else if (document.querySelector('input[name="q' + i + '"]:checked')?.value === "A") {
                score++;
            }
        }
        alert("Your score: " + score + "/20");
    });
});
document.getElementById("exit").addEventListener("click", function () {
    window.location.replace('../user.client/index.php')
});


