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
$pages = pages();
$num_position = position(); // номера position
switch($view){
	// страницы
	case('pages'):
		$pages = pages();
	break;

	// разделы
	case('sections'):
		$page_id = 1; // номер страницы из БД
		$section = section($page_id);

		// удаление раздела
		if(isset($_GET['del'])){
			$id = (int)$_GET['del']; // получаем id раздела
			$img = get_section($id);
			
				@unlink(BIG.$img['img']); // удаляем img max
				@unlink(THUMB.$img['img']); // удаляем img mim
			

			if(delSection($id)){ // удаление раздела учителя
				$_SESSION['res'] = "Удалено!";
				redirect('?view=sections');
			}else{
				$_SESSION['res'] = "Ошибка удаления!";
				redirect();
				exit;
			}
		}
	break;

	// добавление раздела
	case('add_section'):
		$page_id = 1;
		if($_POST){
			$name = clear_admin($_POST['name']);
			$text_min = clear_admin($_POST['text_min']);
			$text_full = clear_admin($_POST['text_full']);
			if(isset($_POST['visible'])){
				$visible = 1;
			}else{
				$visible = 0;
			}
		
			// получаем максимальное число position
			$num = '';
			foreach($num_position as $numb => $val){
				$num[] .= $val['position'];
			}
			$position = max($num)+1;

			if(!empty($name)){

				// загрузка img
				if(!empty($_FILES['files']['name'])){
					$img = insertImg();
					if($img == $_SESSION['answer']){
						$img = "no_image.jpg";
						redirect();
						exit;
					}
				}else{
					$img = ''; // если загрузки картинки не произошло, ставим пустым
					if(empty($img)){
						$img = "no_image.jpg";
					}
				}

				// функция для добавления раздела
				if(addSection($name, $img, $position, $text_min, $text_full, $visible, $page_id)){
					$_SESSION['res'] = "Раздел добавлен!";
					redirect('?view=sections');
					exit;
				}else{
					$_SESSION['add']['res'] = "Ошибка!";
					redirect();
					exit;
				}
			}else{
				$_SESSION['add']['res'] = "Вы забыли ввести имя раздела!"; // забыли ввести имя раздела
			}
		}
		
	break;

	// редактирование раздела
	case('edit_section'):
		$id = (int)$_GET['id'];
		$get_section = get_section($id);
		if($_POST){
			// загрузка img
			if(!empty($_FILES['files']['name'])){
				$img = insertImg(); // загружаем img
				if($img == $_SESSION['answer']){
					redirect();
					exit;
				}else{
					$del_img = get_section($id);
					@unlink(BIG.$del_img['img']); // удаляем img max
					@unlink(THUMB.$del_img['img']); // удаляем img mim
				}
	
			}else{
				$img = $get_section['img']; // если не было картинки, оставляем старую
			}

			if(edit_section($id, $img)) redirect('?view=sections');
			else redirect();
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
								$_SESSION['res']['ok'] = "Фото успешно загружено!";
						}else{
								$_SESSION['answer'] = "Не удалось переместить картинку! Проверьте права на папку /images/gallery/";
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
				$title = clear_admin($_POST['title']);
				$name_a = clear_admin($_POST['name_a']);
				$name_b = clear_admin($_POST['name_b']);
				$text = clear_admin($_POST['text']);
				$imgDel = clear_admin($_POST['img_thumbs']); // получаем переменную для удаления картинки

				// проверяем и загружаем фото
				if(!empty($_FILES['files']['name'])){
					$fileName = insertImg(); // функция для провери и отправки на сервер images
					/// если ошибка, тода выводим ошибку, если нет ошибка присваеваем к переменным $img_thu и $img_full
					if($fileName != $_SESSION['answer']){
						$img_thumbs = $fileName; // присвоили имя новой мини картинки
						$img_full = $fileName; // присвоили имя новой max картинки
						@unlink(BIG.$imgDel); // удаление картики max
						@unlink(THUMB.$imgDel); // удаление картинки min
					}else{
						header("Location: ?{$_SERVER['QUERY_STRING']}");
						exit;
					}
				}else{
					$img_thumbs = $imgDel; // берем из $_POST если не было новой картинки.
					$img_full = $imgDel;
				}

				// обновляем данные из галереи
				if(editGallery($id, $title, $name_a, $name_b, $text, $img_thumbs, $img_full)){
					$_SESSION['res']['ok'] = "Обновлено!";
					header("Location: /admin/index.php?view=gallery"); // возращаемся в добавление фото галереи
					exit;
				}else{
					$_SESSION['answer'] = "Ошибка обновления!";
					header("Location: {$_SERVER['PHP_SELF']}");
					exit;
				}
				
			}

			// удаляем фото и данные по галереи
			if(isset($_GET['del_id'])){
				$del_id = (int)$_GET['del_id']; // получаем id на удаление фото
				$get_gallery_id = get_gallery_id($del_id); // выводим данные для редактирование, полученные через id
				$imgDel = $get_gallery_id['img_thumbs']; // получаем переменную имени картинки для удаления
				if(delGallery($del_id)){ // вызываем функуию на удаление фото по id
					@unlink(BIG.$imgDel); // удаление картики max
					@unlink(THUMB.$imgDel); // удаление картинки min
					header("Location: /admin/index.php?view=gallery");
					exit;
				}
			}
	break;

	case('teacher'):
		$page_id = 3; // номер id страницы из БД
		$teacher = teacher($page_id); // получаем разделы учитель
		if(isset($_GET['del'])){
			$id = (int)$_GET['del']; // получаем id раздела
			$img = get_section($id);
			
				@unlink(BIG.$img['img']); // удаляем img max
				@unlink(THUMB.$img['img']); // удаляем img mim
			

			if(delSection($id)){ // удаление раздела учителя
				$_SESSION['res'] = "Удалено!";
				redirect('?view=teacher');
			}else{
				$_SESSION['res'] = "Ошибка удаления!";
				redirect();
				exit;
			}
		}
	break;

		// добавление раздела учитель
	case('add_teacher'):
		if(isset($_POST['name'])){
			$page_id = 3; // номер id страницы из БД
			$name = clear_admin($_POST['name']); // название статьи
			$text_min = clear_admin($_POST['text_min']); // мини текст статьи
			$text_full = clear_admin($_POST['text_full']); // полный текст статьи

			// получаем максимальное число position
			$num = '';
			foreach($num_position as $numb => $val){
				$num[] .= $val['position'];
			}
			$position = max($num)+1;

			// загрузка img
			if(!empty($_FILES['files']['name'])){
				$img = insertImg(); // загружаем img
				if($img == $_SESSION['answer']){
					$img = "/img/no_image.jpg";
				}
			}

			if(addTeacher($name, $img, $position, $text_min, $text_full, $page_id)){
				$_SESSION['res'] = "Добавлено!";
				redirect('?view=teacher');
			}else{
				redirect();
			}
		}
	break;

		// редактирование раздела учитель
	case('edit_teacher'):
		$id = clear_admin($_GET['id']);
		$get_section = get_section($id);
		

		if($_POST){
			// загрузка img
			if(!empty($_FILES['files']['name'])){
				$img = insertImg(); // загружаем img
				if($img == $_SESSION['answer']){
					redirect();
					exit;
				}else{
					$del_img = get_section($id);
					@unlink(BIG.$del_img['img']); // удаляем img max
					@unlink(THUMB.$del_img['img']); // удаляем img mim
				}
	
			}else{
				$img = $get_section['img']; // если не было картинки, оставляем старую
			}

			if(edit_section($id, $img)) redirect('?view=teacher');
			else redirect();
		}
	break;

	// редактирование контактов
	case('contact'):
		$contact = constants('contact');
		if(isset($_POST['value'])){
			$value = clear_admin($_POST['value']);
			if(editConstants('contact', $value)){
				$_SESSION['edit']['res'] = "Обновлена!";
				redirect();
				exit;
			}else{
				$_SESSION['edit']['res'] = "Вы ничего не изменили!";
				redirect();
				exit;
			}
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
