function showhide() {
    var elem = document.querySelector('#showhide');
    var elem1 = document.querySelector('#el1');
    var elems2 = document.querySelectorAll('#showhide1');
    var elems3 = document.querySelectorAll('#el2');    

    elem.classList.toggle("showhide");
    elem1.classList.toggle("showhide");

    elems2.forEach(function(el) {
        el.classList.toggle("showhide");
    });

    elems3.forEach(function(el) {
        el.classList.toggle("showhide");
    });
}

function showhide2() {
    var elems = document.querySelectorAll('#showhide3');
    var elems1 = document.querySelectorAll('#el3');

    elems.forEach(function(el) {
        el.classList.toggle("showhide");
    });

    elems1.forEach(function(el) {
        el.classList.toggle("showhide");
    });
}

// Функция для ТРЕТЬЕГО КУРСА
function showhide4() {
    var elems = document.querySelectorAll('#showhide4');
    var elems1 = document.querySelectorAll('#el4');

    elems.forEach(function(el) {
        el.classList.toggle("showhide");
    });

    elems1.forEach(function(el) {
        el.classList.toggle("showhide");
    });
}

// Функция для ЧЕТВЕРТОГО КУРСА
function showhide5() {
    var elems = document.querySelectorAll('#showhide5');
    var elems1 = document.querySelectorAll('#el5');

    elems.forEach(function(el) {
        el.classList.toggle("showhide");
    });

    elems1.forEach(function(el) {
        el.classList.toggle("showhide");
    });
}