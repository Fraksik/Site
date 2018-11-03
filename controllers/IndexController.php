<?php

namespace fraksik\controllers;

class IndexController extends Controllers
{

	public function actionIndex()
    {
	    echo $this->render("index", []);
    }

}