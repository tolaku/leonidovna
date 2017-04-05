<?php 
define('VOROBEY', TRUE); 
session_start();
include $_SERVER['DOCUMENT_ROOT'].'/config.php';

if($_SESSION['auth']['admin']) {
	header("Location: ". PATH ."admin/");
	exit;
}

if($_POST){
	$username = trim(mysqli_real_escape_string($db, $_POST['username']));
	$password = trim($_POST['password']);
	$query = "SELECT name, password FROM user WHERE username = '$username' LIMIT 1";
	$result = mysqli_query($db, $query) or die(mysqli_error());
	$row = mysqli_fetch_assoc($result);
	
	// сверяем пароль с БД
	if($row['password'] == md5($password)){
		$_SESSION['auth']['admin'] = htmlspecialchars($row['name']); // получаем нашу сессию и присваиваем имя
		header("Location: ../");
		exit;
	}else{
		$_SESSION['error'] = "<div class='error'>Логин и пароль не совпадают!</div>";
		header("Location: {$_SERVER['PHP_SELF']}"); // возращаемся в админ /admin/index.php
		exit;
	}
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Админ - управление сайтом</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
<form id="login" method="post" action="">
    <h1>Форма входа</h1>
    <?php if(isset($_SESSION['error'])) {
	echo $_SESSION['error']; 
	unset($_SESSION['error']); 
	} ?>
    <fieldset id="inputs">
        <input id="username" type="text" name="username" placeholder="Логин" autofocus required>   
        <input id="password" type="password" name="password" placeholder="Пароль" required>
    </fieldset>
    <fieldset id="actions">
        <input type="submit" id="submit" value="ВОЙТИ">
    </fieldset>
</form>
</body>
</html>