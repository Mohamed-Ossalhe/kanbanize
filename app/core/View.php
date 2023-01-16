<?php
class View {
    protected $view_file;
    protected $view_data;

    public function __construct($view_file, $view_data)
    {
        $this->view_file = $view_file;
        $this->view_data = $view_data;
    }

    public function render() {
        if(file_exists(VIEW . $this->view_file . '.php')) {
            require_once VIEW . $this->view_file . '.php';
        }
    }
}