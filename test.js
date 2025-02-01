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
  var result = confirm("У вас будет только 1 попытка, начинаем?");
  if(result){
 window.location = "test_free.html";   
  }else{

  }
  
};
