/*$(document).ready(function(){
	$('.toggle').next().hide();
	$('.toggle').click(function(){
		$(this).next().slideToggle(500);
	});
});
*/

$(document).ready(function(){
	$('.del').click(function(){
		var res = confirm("Подтвердите удаление!");
		if(!res) return false;
	})
});