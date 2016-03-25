<?php

namespace malahov\controllers;

use malahov\core\Controller;
use malahov\core\Model;
use malahov\core\View;

class LoginController extends Controller
{



    public function dashboardAction()
    {
        $this->model = new indexModel();
        echo $this->view->render('admin-page-dashboard', 'layouts' . DS . 'default');  //page, layout
    }
}
