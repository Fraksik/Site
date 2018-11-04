<?php

namespace fraksik\controllers;

use fraksik\base\Main;

class IndexController extends Controllers
{
	public function actionIndex()
    {
    	$events = Main::call()->historyDB->getAll(true);
	    echo $this->render("index", ['events' => $events]);
    }
}