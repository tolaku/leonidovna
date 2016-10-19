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

/* Получение разделова */
function section($page_id){
	global $db;
	$query = "SELECT id, name FROM section WHERE page_id = $page_id ORDER BY position";
	$result = mysqli_query($db, $query);

	$section = array();
	while($row = mysqli_fetch_assoc($result)){
		$section[] = $row;
	}
	return $section;
}
/* Получение разделова */

?>