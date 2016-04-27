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

    /**
     * @param string $content_view  name of file
     * @param array $data from model
     * @return string
     */
    public function render($contentView, $data = [])
    {
        extract($data);
        // content render
        ob_start();
        require_once $this->dir_phtml . $contentView . TEMPLATE_EXTENSION;
        $this->content = ob_get_clean();
        // layout render
        require_once $this->dir_phtml . $this->layout_dafault . TEMPLATE_EXTENSION;
        return ob_get_clean();

    }

    public function renderPartial($contentView, $data = [])
    {
      //  extract($data);
        // content render
        ob_start();
        require_once $this->dir_phtml . $contentView . TEMPLATE_EXTENSION;
        return  ob_get_clean();
    }

    /**
     * @param string $path
     */
    public function template($path)
    {

    }
}