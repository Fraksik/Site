<?php
return [
	'rootDir' => __DIR__ . "/../",
	'templatesDir' => __DIR__ . "/../views/",
	'defaultController' => 'product',
	'controllerNamespace' => "app\\controllers",
	'components' => [
		'db' => [
			'class' => \app\services\Db::class,
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