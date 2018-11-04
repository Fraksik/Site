<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Начало положено</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="container">
	<main class="content">
		<header class="cheader">
			<div class="ckoss"><a href="index"><img src="img/koss.png" alt="logo"></a></div>
			<div class="misl">
				<p>Определение ада: «Тот человек, которым вы стали, в свой последний день на земле встретится с
					человеком, которым вы могли бы стать». &copy; Автор неизвестен</p>
			</div>
			<nav class="cnavi">
				<ol>
					<li><a href="index">На главную</a></li>
					<li><a href="greentrans">Грин Транс</a></li>
					<li><a href="projects">Проекты</a></li>
					<li class="clit"><a href="liter">Список литературы</a></li>
				</ol>
			</nav>
		</header>

		<?= $content ?? null ?>

		</main>
		<footer class="caddress">
				<address><span>&copy;&nbsp;Все права защищены. /<a href="mailto:fraks@list.ru">fraks@list.ru</a>/
						<a href="https://twitter.com/Kolbaska?lang=ru">twitter</a>/ октябрь 2017 </span></address>
		</footer>
	</div>
</body>
</html>