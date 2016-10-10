<?php defined('VOROBEY') or die('Простите, не нужно...'); 

/* Получение товаров */
function pages(){
	global $db;
	$query = "SELECT id, name FROM pages";
	$result = mysqli_query($db, $query);

	$pages = array();
	while($row = mysqli_fetch_assoc($result)){
		$pages[] = $row;
	}
	return $pages;
}
/* :получение товаров */

?>