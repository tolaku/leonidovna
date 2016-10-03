<?php defined('VOROBEY') or die('Простите, может не нужно....');

/* функция распечатки массива */
function print_arr($arr){
	echo "<pre>";
	print_r($arr);
	echo "</pre>";
}

/* функция очищает входящие данные */

function clear($var){
	$var = mysql_real_escape_string(strip_tags(trim($var)));
	return $var;
}

/* отправка письма */
function mail_order(){
	$name = clear($_POST['name']);
	$email = clear($_POST['email']);
	$subject = clear($_POST['subject']);
	$phone = clear($_POST['phone']);
	$message = clear($_POST['message']);

	// Заголовки
	$headers .= "Content-type: text/plain; charset=utf-8\r\n";
	$headers .= "From: LEONIDOVNA.OF.BY";

	$mail_body = "\r\nИмя: {$name}\r\nEmail: {$email}\r\nТелефон: {$phone}\r\nСообщение: {$message}";
	mail('tola_k@mail.ru', $subject, $mail_body, $headers);
	$_SESSION['contact']['res'] = "<p class='success'> - Ваше сообщение отправлено - Светлане Леонидовне :)</p><p class='success'> - Благодарим Вас!</p>";
}


/* редирект */
function rederect(){
	$redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
	header("Location:$redirect");
	exit;
}

 ?>