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

?>