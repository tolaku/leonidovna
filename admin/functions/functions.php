<?php defined('VOROBEY') or die('Простите, может не нужно....');
/* Получение товаров */
function pages(){
	global $db;
	$query = "SELECT id, name, url_page FROM pages ORDER BY position";
	$result = mysqli_query($db, $query);

	$pages = array();
	while($row = mysqli_fetch_assoc($result)){
		$pages[] = $row;
	}
	return $pages;
}
/* :получение товаров */

/* получение position */
function position(){
	global $db;
	$query = "SELECT position FROM section";
	$result = mysqli_query($db, $query);

	$position = array();
	while($row = mysqli_fetch_assoc($result)){
		$position[] = $row;
	}
	return $position;
}

/* Получение разделов */
function section($page_id){
	global $db;
	$query = "SELECT id, name, img, position FROM section WHERE page_id = $page_id ORDER BY position";
	$result = mysqli_query($db, $query);

	$section = array();
	while($row = mysqli_fetch_assoc($result)){
		$section[] = $row;
	}
	return $section;
}
/* Получение разделов */

/* Получаем данные по разделу*/
function get_section($id){
	global $db;
	$query = "SELECT a.name, a.img, a.position, a.visible, b.text_min, b.text_full FROM section a
					INNER JOIN section_text b  
					WHERE a.id = $id AND b.section_id = $id";
	$result = mysqli_query($db, $query);

	$get_section = array();
	$get_section = mysqli_fetch_assoc($result);
	return $get_section;
}
/* получаем данные по разделу*/

/* Добавление раздела */
function addSection($name, $img, $position, $text_min, $text_full, $visible, $page_id){
	global $db;
	$result = "INSERT INTO section (name, img, position, visible, page_id)
				VALUES ('$name', '$img', $position, $visible, $page_id)";
	$query = mysqli_query($db, $result) or die(mysqli_error());

	if(mysqli_insert_id($db)){
		$section_id = mysqli_insert_id($db);
		$result = "INSERT INTO section_text (text_min, text_full, section_id, page_id)
					VALUES ('$text_min', '$text_full', '$section_id', '$page_id')";
		$query = mysqli_query($db, $result) or die(mysqli_error());

		if(mysqli_affected_rows($db) > 0){
			return true;
		}else{
			return false;
		}
	}
}
/* :добавление раздела */

/* Редактируем данные по разделу */
function edit_section($id, $img){
	global $db;
	$name = clear_admin($_POST['name']);
	$text_min = clear_admin($_POST['text_min']);
	$text_full = clear_admin($_POST['text_full']);
	$position = (int)$_POST['position'];
	if(isset($_POST['visible'])){
				$visible = 1;
	}else{
			$visible = 0;
		}


	
		// отправляем в БД
		$query = "UPDATE section a, section_text b SET
				a.name = '$name',
				a.img = '$img',
				a.position = '$position',
				a.visible = $visible,
				b.text_min = '$text_min',
				b.text_full = '$text_full'
					WHERE a.id = $id AND b.section_id = $id";
		$result = mysqli_query($db, $query) or die(mysqli_error());

		// Проверяем было ли изменение и сообщаем
		if(mysqli_affected_rows($db) > 0){
			$_SESSION['res'] = "<div class='success'>Раздел обновлен!</div>";
			return true;
		}else{
			$_SESSION['edit']['res'] = "<div class='error'>Ошибка или вы ничего не меняли!</div>";
			return false;
		}
	
	
}
/* редактируем данные по разделу */

/* Удаление раздела */
function delSection($id){
	global $db;
	mysqli_query($db, "DELETE FROM section WHERE id = $id");
	mysqli_query($db, "DELETE FROM section_text WHERE section_id = $id");

	if(mysqli_affected_rows($db) > 0){
		return true;
	}else{
		return false;
	}
}
/* :удаление раздела */

/* Выводим галерею */
function get_gallery(){
	global $db;
	$query = "SELECT id, name_a, img_thumbs, text FROM gallery";
	$result = mysqli_query($db, $query);

	$get_gallery = array();
	while($row = mysqli_fetch_assoc($result)){
		$get_gallery[] = $row;
	}

	return $get_gallery;
}
/* :выводим галерею */

/* Выводим разделы по странице учитель (teacher) */
function teacher($page_id){
	global $db;
	$query = "SELECT id, name, img FROM section WHERE page_id = $page_id ORDER BY position";
	$result = mysqli_query($db, $query) or die(mysqli_error());

	$teacher = array();
	while($row = mysqli_fetch_assoc($result)){
		$teacher[] = $row;
	}
	return $teacher;
}
/* :выводим разделы по странице учитель (teacher) */

/* Добавить раздел teacher (учитель) */
function addTeacher($name, $img, $position, $text_min, $text_full, $visible, $page_id){
	global $db;
	$query = "INSERT INTO section (name, img, position, visible, page_id) 
				VALUES ('$name', '$img', $position, $visible, $page_id)";
	$result = mysqli_query($db, $query) or die(mysqli_error());
	$section_id = mysqli_insert_id($db);

	if($section_id){
		$query = "INSERT INTO section_text (text_min, text_full, section_id, page_id)
					VALUES ('$text_min', '$text_full', $section_id, $page_id)";
		$result = mysqli_query($db, $query) or die(mysqli_error());

		if(mysqli_affected_rows($db) > 0){
			return true;
		}else{
			return false;
		}
	}
	
}
/* :добавить раздел teacher (учитель) */

/* Выводим галерею по id */
function get_gallery_id($id){
	global $db;
	$query = "SELECT * FROM gallery WHERE id = $id";
	$result = mysqli_query($db, $query);

	$get_gallery_id = array();
	$get_gallery_id = mysqli_fetch_assoc($result);
	return $get_gallery_id;
}
/* выводим галлерею по id */

/* Редактируем галерею имея id */
function editGallery($id, $title, $name_a, $name_b, $text, $img_thumbs, $img_full){
	global $db;
	$query = "UPDATE gallery SET title = '$title', name_a = '$name_a', name_b = '$name_b', text = '$text', img_thumbs = '$img_thumbs', img_full = '$img_full' WHERE id = $id";
	$result = mysqli_query($db, $query) or die(mysqli_error());

	if(mysqli_affected_rows($db) > 0){
		return true;
	}else{
		return false;
	}
}
/* :редактируем галерею имея id */

/* Удаляем галерею*/
function delGallery($del_id){
	global $db;
	$query = "DELETE FROM gallery WHERE id = $del_id";
	$result = mysqli_query($db, $query);

	if(mysqli_affected_rows($db) > 0){
		$_SESSION['res']['ok'] = "<div class='success'>Фото удалено!</div>";
		return true;
	}else{
		$_SESSION['answer'] = "<div class='error'>Ошибка удаления!</div>";
		return false;
	}
}
/* :удаляем галерею*/

/* Проверяем images перед загрузкой и загружаем на сервер */
function insertImg(){
	$fileName = $_FILES['files']['name'];
	$fileExt = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $fileName)); // получаем расширение с помощью регулярного выражения
	$fileName = time().".".$fileExt; // заменяем имя на секунды Unix
	$fileTmpName = $_FILES['files']['tmp_name']; // получаем временное имя картинке
	$fileType = $_FILES['files']['type']; // получаем тип файла
	$fileSize = $_FILES['files']['size']; // вес файла
	$fileError = $_FILES['files']['error']; // 0 - ok, иначе - ошибка

	$types = array();  // масив допустимых расширений
	$types = array('image/gif', 'image/png', 'image/jpeg', 'image/x-png', 'image/pjpeg');

	$error = "";

	/* проверяем файл на расширение */
	if(!in_array($fileType, $types)){
		$error .= "Допустимые расширения - .gif, .png, .jpeg! <br>";
		$_SESSION['answer'] .= "Ошибка при загрузке картинки - {$_FILES['files']['name']}<br>{$error}";
	}

	/* проверяем файл на размер */
	if($fileSize > SIZE){
		$error .= "Максимальный вес файла - 1мб.";
		$_SESSION['answer'] .= "Ошибка при загрузке картинки - {$_FILES['files']['name']}<br>{$error}";
	}

	/* ошибка при загрузке файла */
	if($fileError){
		$error .= "Ошибка при загрузке файла";
		$_SESSION['answer'] .= "Ошибка при загрузке картинки - {$_FILES['files']['name']}<br>{$error}";
	}

	/* если нет ошибок перемещаем фото на сервер */
	if(empty($error)){
		if(@move_uploaded_file($fileTmpName, BIG.$fileName)){
			$target = BIG.$fileName; // путь к оригинальному файлу
			$dest = THUMB.$fileName; // путь к сохранению обработаному файлу

			// запускаем функцию по ресайзу картинки
			resize($target, $dest, WIDTH, HEIGHT, $fileExt);

			return $fileName; // имя загруженной картинке на сервер
		}else{
			return $_SESSION['answer'] = "Не удалось переместить картинку! Проверьте права на папку /images/gallery/";
		}
	}else{
		return $_SESSION['answer'];
	}
	
}
/* :проверяем фото перед загрузкой на сервер и загружаем на сервер */

/* Ресайз картинки */
function resize($target, $dest, $wmax, $hmax, $ext){
	// $target - путь к оригинальному файлу
	// $dest - путь сохранения обработаного файла
	// $wmax - максимальная ширина
	// $hmax - максимальная высота
	// $ext - расширение файла 

	list($w_orig, $h_orig) = getimagesize($target); // получаем размер картинки / we get the picture size

	// получаем коэфициент соотношений размеров данной картинки, 1 - квадрат, <1 - портретная, >1 - альбомная
	$ratio = $w_orig / $h_orig;

	// вычисляем не достающий размер
	if(($wmax / $hmax) > $ratio){
		// вычисляем ширину
		$wmax = $hmax * $ratio;
	}else{
		// вычисляем высоту
		$hmax = $wmax / $ratio;
	}

	$img = ""; // cоздаем пустое изображение
	switch($ext){
		case('gif'):
			$img = imagecreatefromgif($target); // создаем копию и сохраняем в пустое созданое изображение
			break;
		case('png'):
			$img = imagecreatefrompng($target);
			break;
		default:
			$img = imagecreatefromjpeg($target);
	}

	// создаем оболочку для новой картинки
	$newimg = imagecreatetruecolor($wmax, $hmax);

	// png оставляем прозрачность
	if($ext == 'png'){
		imagesavealpha($newimg, true); // сохранение альфа канала
		$transPng = imagecolorallocatealpha($newimg, 0, 0, 0, 127); // создаем прозрачность
		imagefill($newimg, 0, 0, $transPng); 
	}

	// копию картинки $img помещаем в оболочку $newimg
	imagecopyresampled($newimg, $img, 0, 0, 0, 0, $wmax, $hmax, $w_orig, $h_orig); // копируем и ресайзим изображение

	// сохраняем картинку обработаную в папку и делаем качество по желанию
	switch ($ext) {
		case 'gif':
			imagegif($newimg, $dest);
			break;
		case 'png':
			imagepng($newimg, $dest);
			break;
		
		default:
			imagejpeg($newimg, $dest);
			break;
	}

	// удаляем оболочку картинки
	imagedestroy($newimg);

}
/* Ресайз картинки */

/* Заносим даные о картинке */
	function gallery_insert($title, $name_a, $name_b, $text, $img_thumbs, $img_full){
		$title = clear_admin($title);
		$name_a = clear_admin($name_a);
		$name_b = clear_admin($name_b);
		$text = clear_admin($text);

		global $db;
		$query = "INSERT INTO gallery (title, name_a, name_b, text, img_thumbs, img_full)
						VALUES ('$title', '$name_a', '$name_b', '$text', '$img_thumbs', '$img_full')";
						//exit($query);
		$result = mysqli_query($db, $query) or die(mysqli_error());
		// отправить ссесию сообщение, фото добавлено.
		if(mysqli_affected_rows($db) > 0){
			return true;
		}
	}
/* :заносим даные о картинке */

/* Выводим константу */
function constants($name){
	global $db;
	$query = "SELECT * FROM constants WHERE name = '$name'";
	$result = mysqli_query($db, $query) or die(mysqli_error());

	$name = mysqli_fetch_assoc($result);
	return $name;
}
/* :выводим константу */

/* Выводим все константы*/
function constAll(){
	global $db;
	$query = "SELECT name, title FROM constants";
	$result = mysqli_query($db, $query) or die(mysqli_error());
	$const = array();
	while($row = mysqli_fetch_assoc($result)){
		$const[] = $row;
	}
	return $const;
}
/* :выводим все константы*/

/* Редактируем константы */
function editConstants($name, $value){
	global $db;
	$query = "UPDATE constants SET value = '$value' WHERE name = '$name'";
	$result = mysqli_query($db, $query) or die(mysqli_error());

	if(mysqli_affected_rows($db) > 0){
		return true;
	}else{
		return false;
	}
}
/* :едактируем константу */

/* Редирект */
function redirect($http = false){
	if($http) $redirect = $http;
	else $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
	header("Location: $redirect");
	exit;
}
/* :редирект */

/* Фильтр входящих данных из админки */
function clear_admin($var){
	global $db;
	$var = trim(mysqli_real_escape_string($db, $var));
	return $var;
}
/* :фильтр входящих данных из админки */

?>