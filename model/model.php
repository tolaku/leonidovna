<?php 
defined('VOROBEY') or die('Простите, не нужно.');

/*=== Получение разделов на главной странице ===*/
function section($page_id) {
	global $db;
	$query = "SELECT a.id, a.name, a.img, a.visible, b.text_min, b.page_id FROM section a
				INNER JOIN section_text b ON a.id = b.section_id AND b.page_id = $page_id AND a.visible = 1
				 ORDER BY a.position";
	$result = mysqli_query($db, $query) or die(mysql_error());

	$section = array();
	while($row = mysqli_fetch_assoc($result)){
		$section[] = $row;
	}
	return $section;
}
/*=== :получение разделов на главной странице ===*/

/*=== Выводим разделы ===*/
function pages(){
	global $db;
	$query = "SELECT id, name, url_page FROM pages ORDER BY position";
	$result = mysqli_query($db, $query);

	$pages = array();
	while($row = mysqli_fetch_assoc($result)){
		$pages[] = $row;
	}
	return $pages;
}
/*=== :выводим разделы ===*/

/* Выводим содержимое страницы */
function viewId($id){
	global $db;
	$query = "SELECT a.id, a.name, a.img, a.page_id, b.text_full, b.section_id FROM section a
				INNER JOIN section_text b ON a.id = b.section_id AND a.id = $id";
	$result = mysqli_query($db, $query) or die(mysqli_error());
	$viewId[] = array();
	$viewId = mysqli_fetch_assoc($result);
	return $viewId;
}
/* :выводим содержимое страницы */

/*=== Подключение констант ===*/
function constants($name){
	global $db;
	$query = "SELECT value FROM constants WHERE name = '$name'";
	$result = mysqli_query($db, $query);

	$name = mysqli_fetch_row($result);
	return $name[0];
}
/*=== :подключение констант ===*/

/*=== Галлерея ===*/
function gallery(){
	global $db;
	$query = "SELECT * FROM gallery ORDER BY id DESC";
	$result = mysqli_query($db, $query);

	$gallery = array();
	while($row = mysqli_fetch_assoc($result)){
		$gallery[] = $row;
	}
	return $gallery;
}
/*=== :галлерея ===*/
 ?>