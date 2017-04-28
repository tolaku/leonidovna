<?php defined('VOROBEY') or die("Простите, а может не нужно..."); ?>
<?php //print_arr($_POST) ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
		<title>Светлана Леонидовна</title>
		<link rel="stylesheet" type="text/css" href="<?=TEMPLATE?>css/style.css" />
		<link rel="stylesheet" type="text/css" href="<?=TEMPLATE?>css/gallery.css" />
	</head>
	<body>
		<div class="container">
			<header>
            <img src="<?=TEMPLATE?>img/logo.png" class="logo" />
            <div class="logo_t">Учитель, который любит свою работу</div>
                <ul>
                	<li><a href="/" <?php if($view == "page") echo "class='active'"; ?>>Главная</a></li>
                	<!-- Выводим остальные страницы -->
                	<?php foreach($pages as $page): ?>
	                    <li><a href="?view=<?=$page['url_page']?>" <?php if($view == $page['url_page']) echo "class='active'"; ?>><?=$page['name']?></a></li>
                	<?php endforeach; ?>
                </ul>
            </header>