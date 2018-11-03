<?php

namespace fraksik\controllers;


abstract class Controllers
{
	protected $action;
	protected $request;
	protected $session;
	protected $defaultAction = 'index';
	protected $layout = "main";
	protected $useLayout;
	private $renderer = null;

	public function __construct($renderer, $useLayout = true)
	{
		$this->renderer = $renderer;
		$this->useLayout = $useLayout;

	}

	public function run($action = null)
	{
		$this->action = $action ?: $this->defaultAction;
		$method = "action" . ucfirst($this->action);
		if(method_exists($this, $method)){
			$this->$method();
		}else{
			echo "404";
		}
	}

	protected function render($template, $params = [])
	{
		if($this->useLayout){
			$content = $this->renderTemplate($template, $params);
			return $this->renderTemplate("layouts/{$this->layout}", ['content' => $content]);
		}
		return $this->renderTemplate($template, $params);
	}

	protected function renderTemplate($template, $params = [])
	{
		return $this->renderer->render($template, $params);
	}
}