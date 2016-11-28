<?php 
defined('VOROBEY') or die('Простите, я новчек в этом деле...');

define('PATH', 'http://leonidovna/'); // адрес сайта

define('MODEL', 'model/model.php'); // адрес model

define('CONTROLLER', 'controller/controller.php'); // путь к контроллеру

define('VIEW', PATH.'views/'); // путь к шаблонам сайта

define('TEMPLATE', VIEW.'risovanie/'); // шаблон сайта

define('TEMPLATE_ADMIN', './templates/'); // шаблон административной части

// сервер БД
define('HOST', 'localhost');

// пользователь
define('USER', 'shkola');

// пароль
define('PASS', '123');

// название БД
define('NAME', 'leonidovna');

// подключение к БД
$db = mysqli_connect(HOST, USER, PASS) or die('Нет соединение с сервером!');
mysqli_select_db($db, NAME) or die('Нет соединение с БД');
mysqli_query($db, "SET NAMES 'UTF8'") or die('Кодировка не подключена');
 ?>