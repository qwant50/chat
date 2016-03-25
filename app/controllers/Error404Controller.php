<?php

namespace malahov\controllers;

use malahov\core\Controller;

class Error404Controller extends Controller
{
    public function actionIndex()
    {
        //$this->model = new indexModel();
        //$this->data = $this->model->run($this->params);
        echo 'Controller: Error404Controller | Action: indexAction<br>';
    }
}