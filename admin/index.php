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
	
	// Добавление галлереи
	case('gallery'):
		$get_gallery = get_gallery(); // выводим картинки
		// загружаем картинку
		if(isset($_FILES['files']['name'])){
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
						if(@move_uploaded_file($filesTmpName, BIG.$filesName)){

								$target = BIG.$filesName; // путь к оригинальному файлу
								$dest = THUMB.$filesName; // путь к сохранению обработаному файлу

								// запускаем функцию по ресайзу картинки
								resize($target, $dest, WIDTH, HEIGHT, $filesExt);

								// заносим данные о картинке в БД
								gallery_insert($_POST['title'], $_POST['name_a'], $_POST['name_b'], $_POST['text'], $filesName, $filesName);
						}else{
								$_SESSION['answer'] = "Не удалось переместить картинку! Проверьте права на папку /images/pics/";
							}					
					}

				}
			}

			header("Location: {$_SERVER['REQUEST_URI']}");
			exit;
		}

	break;

	// редактирование галлереи
	case('edit_gallery'):
			$get_gallery = get_gallery(); // выводим галлерею
			if(isset($_GET['id'])){
				$id = (int)$_GET['id'];
				$get_gallery_id = get_gallery_id($id); // выводим данные для редактирование, полученные через id
			}
			
			// отредактиривали, отправляем в БД
			if(isset($_POST['get_gallery_id'])){
				$id = (int)$_POST['get_gallery_id'];
				$title = trim($_POST['title']);
				$name_a = trim($_POST['name_a']);
				$name_b = trim($_POST['name_b']);
				$text = trim($_POST['text']);

				// проверяем и загружаем фото
				if(isset($_FILES['files']['name'])){
					insert_img(); // функция для провери и отправки на сервер images
					
				}

				/*
				if(editGallery($id, $title, $name_a, $name_b, $text)){
					$_SESSION['res']['ok'] = "Обновлено!";
					header("Location: /admin/index.php?view=gallery"); // возращаемся в добавление фото галереи
					exit;
				}else{
					$_SESSION['answer'] = "Ошибка обновления!";
					header("Location: {$_SERVER['PHP_SELF']}");
					exit;
				}
				*/
			}
	break;

	// удаление галереи
	case('del_gallery'):
		$del_id = (int)$_GET['del_id']; // получаем id на удаление фото
		delGallery($del_id); // вызываем функуию на удаление фото по id
		header("Location: /admin/index.php?view=gallery");
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
