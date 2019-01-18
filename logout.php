<?php 

require('config.php');
unset($_SESSION['user']);
session_destroy();

// Удаляем куки
// $userName = '';
// $userCity = '';
// $expire = time() - 60*60*24*31;
// setcookie('user-name', $userName, $expire);
// setcookie('user-city', $userCity, $expire);

header('Location: ' . HOST . 'index.php');

?>