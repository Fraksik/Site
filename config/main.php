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
			'host' => '81.90.180.80:3306',
			'login' => 'fraksik',
			'password' => 'Rainbow85',
			'database' => 'my_site',
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