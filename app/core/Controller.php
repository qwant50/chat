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

}