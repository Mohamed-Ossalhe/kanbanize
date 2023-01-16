<?php
    class homeController extends Controller {

        public function index() {
            $this->home();
        }

        public function home() {
            $this->view("home/home");
            $this->view->render();
        }
    }
?>