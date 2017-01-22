<?php 
// запрет прямого обращения
define ('VOROBEY', TRUE); 

// запускаем сессию
session_start();

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
			if(edit_section($id)) redirect('?view=sections');
			else reodirect();
		}
	break;
	
	// редактирование галлереи
	case('gallery'):
		$get_gallery = get_gallery();
		// загружаем картинку
		if(isset($_FILES['file'])){
			$types = array(); // масса допустимых расширений
			$types = array('image/gif', 'image/png', 'image/jpeg', 'image/x-png', 'image/pjpeg');

			$fileName = $_FILES['file']['name']; // оригинальное имя картинки
			$fileTmpName = $_FILES['file']['tmp_name']; // временное время картинки
			$fileType = $_FILES['file']['type']; // mime-тип файла
			$fileSize = $_FILES['file']['size']; // вес картинки
			$fileError = $_FILES['file']['error']; // 0 - ОК, иначе - ошибка

			/* регулярное выражение */
			$fileExt = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $fileName)); // получили расширение

			$error = "";

			/* проверка файла */
			if(!$fileTmpName) $error .= "Не выбран файл!<br />";
			if(!in_array($fileType, $types)) $error .= "Допустимые расширения - .gif, .png, .jpg!<br />";
			if($fileSize > SIZE) $error .= "Вы превысили размер файла, больше 1 мб. <br>";
			if($fileError) $error .= "Ошибка при загрузке файла! <br>";
			/* конец проверок */

			// делаем проверку
			if(!empty($error)){
				$_SESSION['res']['error'] = $error;
				header("Location: {$_SERVER['PHP_SELF']}");
				exit;
			}else{}

			// успешно загружен фото

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
