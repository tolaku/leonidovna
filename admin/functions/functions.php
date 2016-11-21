<?php defined('VOROBEY') or die('Простите, не нужно...'); 

/* Получение товаров */
function pages(){
	global $db;
	$query = "SELECT id, name, url_page FROM pages";
	$result = mysqli_query($db, $query);

	$pages = array();
	while($row = mysqli_fetch_assoc($result)){
		$pages[] = $row;
	}
	return $pages;
}
/* :получение товаров */

/* Получение разделов */
function section($page_id){
	global $db;
	$query = "SELECT id, name, img FROM section WHERE page_id = $page_id ORDER BY position";
	$result = mysqli_query($db, $query);

	$section = array();
	while($row = mysqli_fetch_assoc($result)){
		$section[] = $row;
	}
	return $section;
}
/* Получение разделов */

/* Получаем данные по разделу*/
function get_section($id){
	global $db;
	$query = "SELECT a.name, a.img, a.position, b.text_min, b.text_full FROM section a
					INNER JOIN section_text b  
					WHERE a.id = $id AND b.section_id = $id";
	$result = mysqli_query($db, $query);

	$get_section = array();
	$get_section = mysqli_fetch_assoc($result);
	return $get_section;
}
/* получаем данные по разделу*/

/* Редактируем данные по разделу */
function edit_section($id){
	global $db;
	$name = trim($_POST['name']);
	$img = trim($_POST['img']);
	$text_min = trim($_POST['text_min']);
	$text_full = trim($_POST['text_full']);

	if(empty($name)){
		// если нет имени
		$_SESSION['edit_section']['res'] = "<div class='error'>Должно быть название раздела!</div>";
		// редирект на эту же страницу
		return false;
	}else{
		// отправляем в БД
		$query = "UPDATE section a, section_text b SET
				a.name = '$name',
				a.img = '$img',
				b.text_min = '$text_min',
				b.text_full = '$text_full'
					WHERE a.id = $id AND b.section_id = $id";
		$result = mysqli_query($db, $query) or die(mysqli_error());

		// Проверяем было ли изменение и сообщаем
		if(mysqli_affected_rows($db) > 0){
			$_SESSION['answer'] = "<div class='success'>Раздел обновлен!</div>";
			return true;
		}else{
			$_SESSION['edit_section']['res'] = "<div class='error'>Ошибка или вы ничего не меняли!</div>";
			return false;
		}
	}
	
}
/* редактируем данные по разделу */

/* Редирект */
function redirect($http = false){
	if($http) $redirect = $http;
	else $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
	header("Location: $redirect");
	exit;
}
/* :редирект */

?>