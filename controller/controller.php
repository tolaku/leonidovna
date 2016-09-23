<?php 
defined('VOROBEY') or die('Простите не нужно!');

// подключение функций
require_once 'function/functions.php';

// подключаем model
require_once MODEL;

// массив страниц
$pages = pages();

// подключаем константы
//constants($name);

// получение динамической части шаблона
$view = empty($_GET['view']) ? 'page' : $_GET['view'];

// проверяем на какой странице находимся и выводим
switch($view){
	case('page'):
		$sections = section();
	break;

	case('gallery'):
		$gallery = gallery();
	break;

	case('teacher'):

	break;

	case('contact'):

	break;

	default:
	$view = 'page';
}

// подключаем view (шаблон сайта)
require_once TEMPLATE.'index.php';
?>