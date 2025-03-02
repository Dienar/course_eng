document.addEventListener("DOMContentLoaded", function () {
    const progressBar = document.getElementById("userProgress");

    function loadProgress() {
        fetch("../php/progress.php")
            .then(response => response.json())
            .then(data => {
                progressBar.style.width = data.progress + "%";
            })
            .catch(error => console.error("Error loading progress:", error));
    }

    loadProgress();
});
