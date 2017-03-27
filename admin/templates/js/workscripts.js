/* Функция для удаление товаров */
$(document).ready(function(){
	$('.del').click(function(){
		var res = confirm("Подтвердите удаление!");
		if(!res) return false;
	});

});
/* :функция для удаление товаров */

/* Функция проверяет заполнена форма названия*/
	 function checkParams(){
                var name = $('#name').val();
                if(name.length != 0){
                  $('#submit').removeAttr('disabled');
                }else{
                  $('#submit').attr('disabled', 'disabled');
                }
              }
/* :функция проверяет заполнена форма названия*/