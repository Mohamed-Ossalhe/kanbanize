<?php
    class homeController extends Controller {
        // app/ : return app page
        public function index() {
            $this->home();
        }
        // home/app
        public function home() {
            if(isset($_SESSION["user-logged"])) {
                $this->view('home/home', 'TaskBoard Project | Kanbanize');
                $this->view->render();
            }else {
                $this->view("home/authentification", "Authentification | Kanbanize");
                $this->view->render();
            }
        }
        

        // operations
        public function addTask() {
            extract($_POST);
            if(isset($_POST["task_title"]) && isset($_POST["task_description"]) && isset($_POST["end_date"])){
                $data = array(
                    "task-title" => $task_title,
                    "task-desc" => $task_description,
                    "task-status" => "to do",
                    "task-date" => $end_date
                );
                var_dump($data);
                $this->model("Task");
                $this->model->insertData($data);
            }
        }

        // validate inputs and remove special characters
        public function validateData($data) {
            if(isset($data) and !empty($data)) {
                $data = trim($data);
                $data = stripcslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
        }
    }
?>