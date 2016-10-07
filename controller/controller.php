<?php 
defined('VOROBEY') or die('Простите не нужно!');

// открываем сессию
session_start();

// подключение функций
require_once 'function/functions.php';

// подключаем model
require_once MODEL;

// массив страниц
$pages = pages();
$page_id = empty($_GET['page_id']) ? 1 : $_GET['page_id'];
// подключаем константы
//constants($name);

// получение динамической части шаблона
$view = empty($_GET['view']) ? 'page' : $_GET['view'];

// проверяем на какой странице находимся и выводим
switch($view){
	case('page'):
		$sections = section($page_id);
	break;

	case('gallery'):
		$gallery = gallery();
	break;

	case('teacher'):
		$sections = section($page_id);
	break;

	case('contact'):
	// отправка письма
		if(isset($_POST['submit'])){
			mail_order();
			rederect();
		}
	break;

	default:
	$view = 'page';
}

// подключаем view (шаблон сайта)
require_once TEMPLATE.'index.php';
?>