<?php
    class homeController extends Controller {
        // app/ : return app page
        public function index() {
            $this->home();
        }
        // home/app
        public function home() {
            if(isUserLogged()) {
                $this->view('home/home', 'TaskBoard Project | Kanbanize');
                $this->view->render();
            }else {
                $this->view("home/authentification", "Authentification | Kanbanize");
                $this->view->render();
            }
        }
        

        // operations
        // add new column
        public function addColumn() {
            extract($_POST);
            if(!empty($_POST["columnTitle"]) && isset($_SESSION["user-id"])) {
                $data = array(
                    "column-title" => $this->validateData($columnTitle),
                    "column-user" => $_SESSION["user-id"]
                );
                $this->model("Column");
                $this->model->insertData($data);
            }else {
                echo "Please Fill The Field!";
            }
        }
        // get users column
        public function getAllUserColumns() {
            $data = array(
                "user-id" => $_SESSION["user-id"]
            );
            $this->model("Column");
            $columns = $this->model->getAllData($data);
            echo json_encode($columns);
        }
        // add new task
        public function addTask() {
            extract($_POST);
            if(!empty($_POST["task_title"]) && !empty($_POST["task_description"]) && !empty($_POST["end_date"]) && !empty($_POST["column_id"])){
                $data = array(
                    "task-title" => $task_title,
                    "task-desc" => $task_description,
                    "task-status" => "to do",
                    "task-date" => $end_date,
                    "column-id" => $column_id
                );
                var_dump($data);
                $this->model("Task");
                $this->model->insertData($data);
            }else {
                echo "Please Fill All The Fields!";
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