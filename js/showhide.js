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
// на сколько минут ставим таймер
