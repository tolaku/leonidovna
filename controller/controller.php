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
		$page_id = 3; // номер id страницы из БД
		$sections = section($page_id);
	break;

	case('contact'):
	// отправка письма
		if(isset($_POST['submit'])){
			mail_order();
			rederect();
		}
	break;

	case('view'):
		$id = abs((int)$_GET['id']); // получаем ID
		// если есть ID
		if(isset($_GET['id'])){
			if(viewId($id)){ // проверяем существование страницы в БД
				$viewId = viewId($id); // выводим страницу
			}else{
				rederect(PATH);
			}
		}
	break;

	default:
	$view = 'page';
}

// подключаем view (шаблон сайта)
require_once TEMPLATE.'index.php';
?>