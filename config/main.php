<?php
return [
	'rootDir' => __DIR__ . "/../",
	'templatesDir' => __DIR__ . "/../views/",
	'defaultController' => 'index',
	'controllerNamespace' => "fraksik\\controllers",
	'components' => [
		'db' => [
			'class' => \fraksik\services\Db::class,
			'driver' => 'mysql',
			'host' => 'phpOop',
			'login' => 'php',
			'password' => '',
			'database' => 'phpOop',
			'charset' => 'utf8'
		],
		'request' => [
			'class' => \fraksik\services\Request::class
		],
		'renderer' => [
			'class' => \fraksik\services\renderers\TemplateRenderer::class
		],
		'session' => [
			'class' => \fraksik\services\Session::class
		]
	]

];