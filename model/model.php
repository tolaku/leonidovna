<?php 
defined('VOROBEY') or die('Простите, не нужно.');

/*=== Получение разделов на главной странице ===*/
function section($page_id) {
	global $db;
	$query = "SELECT a.id, a.name, a.img, b.text_min, b.page_id FROM section a
				INNER JOIN section_text b ON a.id = b.section_id AND b.page_id = $page_id
				 ORDER BY a.position";
	$result = mysqli_query($db, $query) or die(mysql_error());

	$section = array();
	while($row = mysqli_fetch_assoc($result)){
		$section[] = $row;
	}
	return $section;
}
/*=== :получение разделов на главной странице ===*/

/*=== Выводим страницы ===*/
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
/*=== :выводим страницы ===*/

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