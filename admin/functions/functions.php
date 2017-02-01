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

/* Выводим галлерею */
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
/* :выводим галлерею */

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


/* Редирект */
function redirect($http = false){
	if($http) $redirect = $http;
	else $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
	header("Location: $redirect");
	exit;
}
/* :редирект */

?>