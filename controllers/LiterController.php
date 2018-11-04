<?php

namespace fraksik\controllers;

use fraksik\base\Main;

class LiterController extends Controllers
{
	public function actionIndex()
	{
		$books = Main::call()->literDB->getAll(true);
		echo $this->render("liter", ['books' => $books]);
	}
}