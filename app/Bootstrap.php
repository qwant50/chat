<?php

namespace malahov;

class Bootstrap
{
    public $baseUrl = null;
    public $controller = 'Main';  // default controller
    public $action = 'Index';  // default action
    public $params = [];
    protected $controllerInstance;


    public function init()
    {
        session_start();
    }

    public function router()
    {
        $requestURI = $_SERVER["REQUEST_URI"];

        if ($requestURI === '/') {
            return;
        }
        // prepare URI
        $requestURI = urldecode(trim(htmlspecialchars_decode($requestURI), '/'));

        // query string   www.site.com/controller/action/key1/value1/key2/value2?key3=value3&key4=value4

        // get params after '?'
        parse_str(parse_url($requestURI, PHP_URL_QUERY), $this->params);

        // get path with params devided '/'
        $url = parse_url($requestURI, PHP_URL_PATH);
        $url = explode('/', $url);

        if (count($url)) {
            $this->controller = ucfirst(array_shift($url));
        }
        if (count($url)) {
            $this->action = ucfirst(array_shift($url));
        }

        // get params after action
        while ($url){
            $this->params[array_shift($url)] = count($url) ? array_shift($url) : '';
        }


    }

    public function redirect($controller, $action){
        $this->controller = ucfirst($controller);
        $this->action = ucfirst($action);
        $this->firewall();
        $this->dispatch();
    }

    public function firewall()
    {
        if (!isset($_SESSION['login']) && !in_array($this->controller . $this->action, ['MainLogin', 'MainSignup'])) {
            $this->controller = 'Main';
            $this->action = 'Index';
        }
    }

    public function dispatch()
    {
        $controllerName = __NAMESPACE__ . '\\controllers\\' . $this->controller . 'Controller';
        $actionName = 'action' . $this->action;

        if (!class_exists($controllerName)) {
            $controllerName = __NAMESPACE__ . '\\controllers\\Error404Controller';
            $actionName = 'actionIndex';
        };
        if (!method_exists($this->controllerInstance = new $controllerName($this->params), $actionName)) {
            $actionName = 'actionIndex';
        }

        echo $this->controllerInstance->$actionName();
    }
}
