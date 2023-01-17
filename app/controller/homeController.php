<?php
    class homeController extends Controller {
        // app/ : return app page
        public function index() {
            $this->home();
        }
        // home/app
        public function home() {
            $this->view('home/home', 'TaskBoard Project | Kanbanize');
            $this->view->render();
        }
    }
?>