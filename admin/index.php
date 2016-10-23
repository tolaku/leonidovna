<?php 
// запрет прямого обращения
define ('VOROBEY', TRUE); 

// подключаем файл конфигурации 
require_once '../config.php';

// подключение функций пользовательской части
require_once '../function/functions.php';

// подключение функция администраторской части
require_once 'functions/functions.php';

// получение динамической части шаблона #content
$view = empty($_GET['view']) ? 'pages' : $_GET['view'];

switch($view){
	// страницы
	case('pages'):
		$pages = pages();
	break;

	// разделы
	case('sections'):
		$page_id = 1;
		$section = section($page_id);
	break;

	// редактирование раздела
	case('edit_section'):
		$id = trim($_GET['id']);
		$get_section = get_section($id);
		if($_POST){
			//if(edit_section($id));
		}
	break;
	

	default:
	// если полученное имя не существует
	$view = 'pages';
}

// HEADER
include TEMPLATE_ADMIN.'header.php';

// LEFTBAR
include TEMPLATE_ADMIN.'leftbar.php';

// CONTENT
include TEMPLATE_ADMIN.$view.'.php';

// FOOTER
include TEMPLATE_ADMIN.'footer.php';


?>
