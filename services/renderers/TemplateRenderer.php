<?php

namespace fraksik\services\renderers;

use fraksik\base\Main;

class TemplateRenderer
{
	public function render($template, $params = [])
    {
        ob_start();
        extract($params);
        include Main::call()->config['templatesDir'] . $template . ".php";
        return ob_get_clean();
    }
}