<?php

namespace malahov\core;

class View
{
    public $layout_dafault = 'layouts' . DS . 'default'; // здесь можно указать общий вид по умолчанию.
    public $content = '';
    public $dir_phtml = '';

    public function __construct()
    {
        $this->dir_phtml = DIR_TO_PAGES;
    }

    public function render($content_view, $data = [])
    {
        extract($data);
        // content render
        ob_start();
        require_once $this->dir_phtml . $content_view . TEMPLATE_EXTENSION;
        $this->content = ob_get_clean();
        // layout render
        require_once $this->dir_phtml . $this->layout_dafault . TEMPLATE_EXTENSION;
        return ob_get_clean();

    }

    /**
     * @param string $path
     */
    public function template($path)
    {

    }
}