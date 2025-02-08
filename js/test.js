IMask(
    document.getElementById('phone-mask'),
    {
      mask: '+{7} (000) 000-00-00'
    }
  )
$('#phone-mask').on('input', function() {
    $(this).val($(this).val().replace(/[A-Za-zА-Яа-яЁё]/, ''))
});
function Freetest(){
  Swal.fire({
position: "center",
title: "У вас будет только 1 попытка, начинаем?",
icon: "question",
showCancelButton: true,
confirmButtonColor: "#3085d6",
cancelButtonColor: "#d33",
confirmButtonText: "let`s go!",
cancelButtonText : "litle later"
}).then((result) => {
if (result.isConfirmed) {
window.location.replace("test_free.html");  
}
});
};
