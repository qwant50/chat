<?php

namespace malahov\core;



class Controller {

    public $params = [];
    public $data;
    public $model;
    public $view;

    function __construct($params = [])
    {
        $this->data = $params;
        $this->view = new View();
    }

    /**
     * set token
     *
     * @param array $data
     */
    public function setToken(&$data = [])
    {
        $_SESSION['_csrf'] = md5(uniqid(rand(), 1));
        $data['_csrf'] = $_SESSION['_csrf'];
    }

    public function getToken()
    {
        return isset($_SESSION['_csrf']) ? $_SESSION['_csrf'] : false;
    }

}