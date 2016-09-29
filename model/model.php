<?php 
defined('VOROBEY') or die('Простите, не нужно.');

/*=== Получение разделов на главной странице ===*/
function section($page_id) {
	$query = "SELECT a.id, a.name, a.img, b.text_min, b.page_id FROM section a
				INNER JOIN section_text b ON a.id = b.section_id AND b.page_id = $page_id
				 ORDER BY a.position";
	$result = mysql_query($query) or die(mysql_error());

	$section = array();
	while($row = mysql_fetch_assoc($result)){
		$section[] = $row;
	}
	return $section;
}
/*=== :получение разделов на главной странице ===*/

/*=== Выводим страницы ===*/
function pages(){
	$query = "SELECT id, name, url_page FROM pages ORDER BY position";
	$result = mysql_query($query);

	$pages = array();
	while($row = mysql_fetch_assoc($result)){
		$pages[] = $row;
	}
	return $pages;
}
/*=== :выводим страницы ===*/

/*=== Подключение констант ===*/
function constants($name){
	$query = "SELECT value FROM constants WHERE name = '$name'";
	$result = mysql_query($query);

	$name = mysql_fetch_row($result);
	return $name[0];
}
/*=== :подключение констант ===*/

/*=== Галлерея ===*/
function gallery(){
	$query = "SELECT * FROM gallery ORDER BY id DESC";
	$result = mysql_query($query);

	$gallery = array();
	while($row = mysql_fetch_assoc($result)){
		$gallery[] = $row;
	}
	return $gallery;
}
/*=== :галлерея ===*/
 ?>