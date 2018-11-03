<?php

namespace fraksik\base;

use fraksik\traits\TSingleton;

class Main
{
	use TSingleton;

	public static function call()
	{
		return static::getInstance();
	}

	public $config;

	private $components;

	public function run($config)
	{
		$this->config = $config;
		$this->components = new Storage();
		$this->runController();
	}

	private function runController()
	{
		$controllerName = $this->request->getControllerName() ?: $this->config['defaultController'];
		$actionName = $this->request->getActionName();
		$controllerClass = $this->config['controllerNamespace'] . "\\" . ucfirst($controllerName) . "Controller";

		if (class_exists($controllerClass)) {
			$controller = new $controllerClass(
				new \fraksik\services\renderers\TemplateRenderer()
			);
			$controller->run($actionName);
		}
	}

	public function createComponent($key)
	{
		if (isset($this->config['components'][$key])) {
			$params = $this->config['components'][$key];
			$class = $params['class'];
			if (class_exists($class)) {
				unset($params['class']);
				$reflection = new \ReflectionClass($class);
				return $reflection->newInstanceArgs($params);
			}
		}
	}

	function __get($name)
	{
		return $this->components->get($name);
	}

}