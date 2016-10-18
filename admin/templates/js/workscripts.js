$(document).ready(function(){
	$('.toggle').next().hide();
	$('.toggle').click(function(){
		$(this).next().slideToggle(500);
	});
});