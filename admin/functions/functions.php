<?php defined('VOROBEY') or die('Простите, не нужно...'); 

/* Получение товаров */
function pages(){
	global $db;
	$query = "SELECT id, name, url_page FROM pages";
	$result = mysqli_query($db, $query);

	$pages = array();
	while($row = mysqli_fetch_assoc($result)){
		$pages[] = $row;
	}
	return $pages;
}
/* :получение товаров */

/* Получение разделов */
function section($page_id){
	global $db;
	$query = "SELECT id, name, img FROM section WHERE page_id = $page_id ORDER BY position";
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
	$query = "SELECT a.name, a.img, a.position, b.text_min, b.text_full FROM section a
					INNER JOIN section_text b  
					WHERE a.id = $id AND b.section_id = $id";
	$result = mysqli_query($db, $query);

	$get_section = array();
	$get_section = mysqli_fetch_assoc($result);
	return $get_section;
}
/* получаем данные по разделу*/

/* Редактируем данные по разделу */
function edit_section($id){
	global $db;
	$name = trim($_POST['name']);
	$img = trim($_POST['img']);
	$text_min = trim($_POST['text_min']);
	$text_full = trim($_POST['text_full']);

	if(empty($name)){
		// если нет имени
		$_SESSION['edit_section']['res'] = "<div class='error'>Должно быть название раздела!</div>";
		// редирект на эту же страницу
		return false;
	}else{
		// отправляем в БД
		$query = "UPDATE section a, section_text b SET
				a.name = '$name',
				a.img = '$img',
				b.text_min = '$text_min',
				b.text_full = '$text_full'
					WHERE a.id = $id AND b.section_id = $id";
		$result = mysqli_query($db, $query) or die(mysqli_error());

		// Проверяем было ли изменение и сообщаем
		if(mysqli_affected_rows($db) > 0){
			$_SESSION['answer'] = "<div class='success'>Раздел обновлен!</div>";
			return true;
		}else{
			$_SESSION['edit_section']['res'] = "<div class='error'>Ошибка или вы ничего не меняли!</div>";
			return false;
		}
	}
	
}
/* редактируем данные по разделу */

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
function editGallery($id, $title, $name_a, $name_b, $text){
	global $db;
	$query = "UPDATE gallery SET title = '$title', name_a = '$name_a', name_b = '$name_b', text = '$text' WHERE id = $id";
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
		$_SESSION['answer'] = "Фото удалено!";
		return true;
	}else{
		$_SESSION['answer'] = "Ошибка удаления!";
		return false;
	}
}
/* :удаляем галерею*/

/* Проверяем images перед загрузкой */
function insert_img(){
	$fileName = $_FILES['files']['name']; 
}
/* :проверяем фото перед загрузкой на сервер */

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
		case 'gif':
			$img = imagecreatefromgif($target); // создаем копию и сохраняем в пустое созданое изображение
			break;
		case 'png':
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
		$title = trim($title);
		$name_a = trim($name_a);
		$name_b = trim($name_b);
		$text = trim($text);

		global $db;
		$query = "INSERT INTO gallery (title, name_a, name_b, text, img_thumbs, img_full)
						VALUES ('$title', '$name_a', '$name_b', '$text', '$img_thumbs', '$img_full')";
						//exit($query);
		$result = mysqli_query($db, $query) or die(mysqli_error());
		// отправить ссесию сообщение, фото добавлено.
		if(mysqli_affected_rows($db) > 0){
			// успешно загружены фото
			$_SESSION['res']['ok'] .= "Фото успешно загружено!";
		}
	}
/* :заносим даные о картинке */

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
	$var = mysqli_real_escape_string($var);
	return $var;
}
/* :фильтр входящих данных из админки */

?>