<?php  

// DB CONNECTION
require('config.php');
require('database.php');
$link = db_connect(); 

require('models/films.php');
require('functions/login-functions.php');

// UPDATE FILM DATA IN DB
if (array_key_exists('updateFilm', $_POST) ) {
	
	// ОБРАБОТКА ОШИБОК
	if ($_POST['title'] == '') {
		$errors[] = "<p>Необходимо ввести название фильма!</p>";
	}

	if ($_POST['genre'] == '') {
		$errors[] = "<p>Необходимо ввести жанр фильма!</p>";
	}

	if ($_POST['year'] == '') {
		$errors[] = "<p>Необходимо ввести год фильма!</p>";
	}

	// Если ошибок нет - сохраняем фильм
	if (empty($errors)) {

		// ЗАПИСЬ ДАННЫХ В БД
		$result = film_update($link, $_POST['title'], $_POST['genre'], $_POST['year'], $_GET['id'], $_POST['description']);
	
		if ( $result) {
			$resultSuccess = "<p>Фильм был успешно обновлен!</p>";
		} else {
			$resultError = "<p>Что-то пошло не так. Добавьте фильм еще раз!</p>";
		}
	}
}

$film = get_film($link, $_GET['id']);


include('views/head.tpl');
include('views/notification.tpl');
include('views/edit-film.tpl');
include('views/footer.tpl');

?>

