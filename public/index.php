<?php
$config = include $_SERVER['DOCUMENT_ROOT'] . "/../config/main.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/../vendor/autoload.php";

\fraksik\base\Main::call()->run($config);

