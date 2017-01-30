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
		if(isset($_FILES['files'])){
			for($i=0; $i < count($_FILES['files']['name']); $i++){
				$error = "";
				if($_FILES['files']['name'][$i]){
					// получаем переменные по нашим картинкам
					$filesName = $_FILES['files']['name'][$i]; // оригинальное имя картинки
					$filesExt = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $filesName)); // получили расширение
					$filesName = time()."_{$i}.".$filesExt; // новое имя картинки
					$filesTmpName = $_FILES['files']['tmp_name'][$i]; // временное время картинки
					$filesType = $_FILES['files']['type'][$i]; // mime-тип файла
					$filesSize = $_FILES['files']['size'][$i]; // вес картинки
					$filesError = $_FILES['files']['error'][$i]; // 0 - ОК, иначе - ошибка

					$types = array(); // масса допустимых расширений
					$types = array('image/gif', 'image/png', 'image/jpeg', 'image/x-png', 'image/pjpeg');

					/* проверка файла на расширение */
					if(!in_array($filesType, $types)) {
					 $error .= "Допустимые расширения - .gif, .png, .jpg!<br />";
					 $_SESSION['answer'] .= "Ошибка при загрузке картинки {$_FILES['files']['name'][$i]} <br> {$error}";
					 continue; // прекращаем работу с картинкой
					}

					/* проверка файла на размер */
					if($filesSize > SIZE){
						$error .= "Максимальный вес файла - 1 мб";
						$_SESSION['answer'] .= "Ошибка при загрузке картинки {$_FILES['files']['name'][$i]} <br> {$error}";
						continue; // прекращаем работу с картинкой
					}

					/* ошибка при загрузке файла */
					if($filesError){
						$error .= "Ошибка при загрузке файла.";
						$_SESSION['answer'] .= "Ошибка при загрузке картинки {$_FILES['files']['name'][$i]} <br> {$error}";
						continue;
					}
					/* конец проверок */

					/* если нет ошибок, перемещаем фото на сервер */
					if(empty($error)){
						@move_uploaded_file($filesTmpName, $_SERVER['DOCUMENT_ROOT']."/images/pics/".$filesName);
						
						$target = $_SERVER['DOCUMENT_ROOT']."/images/pics/".$filesName; // путь к оригинальному файлу
						list($w_orig, $h_orig) = getimagesize($target);

					}

				}
			}


			// успешно загружен фото
			$_SESSION['res']['ok'] .= "Фото успешно загружено!";
			$_SESSION['res']['ok'] .= "{$w_orig} | {$h_orig}";
			header("Location: {$_SERVER['REQUEST_URI']}");
			exit;

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
