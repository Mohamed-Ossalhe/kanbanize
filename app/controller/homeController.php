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
        // add new task
        public function addTask() {
            extract($_POST);
            if(!empty($_POST["task_title"]) && !empty($_POST["task_description"]) && !empty($_POST["end_date"]) && !empty($_POST["task_status"])){
                $data = array(
                    "task-title" => $this->validateData($task_title),
                    "task-desc" => $this->validateData($task_description),
                    "task-status" => $this->validateData($task_status),
                    "task-date" => $this->validateData(date("Y-m-d", strtotime($end_date))),
                    "user-id" => $_SESSION["user-id"]
                );
                var_dump($data);
                $this->model("Task");
                $this->model->insertData($data);
            }else {
                echo "Please Fill All The Fields!";
            }
        }
        // insert multiple tasks
        public function addMultipleTasks() {
            // echo "got it";
            extract($_POST);
            if(!empty($_POST["task_title"]) && !empty($_POST["task_description"]) && !empty($_POST["task_date"]) && !empty($_POST["task_status"])) {
                for($count = 0; $count < count($task_title); $count++) {
                    $data = array(
                        "task-title" => $this->validateData($task_title[$count]),
                        "task-desc" => $this->validateData($task_description[$count]),
                        "task-status" => $this->validateData($task_status[$count]),
                        "task-date" => $this->validateData($task_date[$count]),
                        "user-id" => $_SESSION["user-id"]
                    );
                    // var_dump($data);
                    $this->model("Task");
                    $this->model->insertData($data);
                }
            }else {
                echo "Please Fill All The Fields!";
            }
        }
        // get all tasks related to the specified user
        public function getAllTasks() {
            $data = array(
                "user-id" => $_SESSION["user-id"]
            );
            $this->model("Task");
            $tasks = $this->model->getAllData($data);
            echo json_encode($tasks);
        }
        // get one task related to task and user id
        public function getTask() {
            extract($_POST);
            if(!empty($_POST["task_id"])) {
                $data = array(
                    "task-id" => $this->validateData($task_id),
                    "user-id" => $_SESSION["user-id"]
                );
                $this->model("Task");
                $task = $this->model->getRowData($data);
                echo json_encode($task);
            }
        }
        // update task
        public function updateTask() {
            extract($_POST);
            if(!empty($_POST["task_title"]) && !empty($_POST["task_description"]) && !empty($_POST["end_date"]) && !empty($_POST["task_status"]) && !empty($_POST["task_id"])){
                $data = array(
                    "task-title" => $this->validateData($task_title),
                    "task-desc" => $this->validateData($task_description),
                    "task-status" => $this->validateData($task_status),
                    "task-date" => $this->validateData(date("Y-m-d", strtotime($end_date))),
                    "task-id" => $this->validateData($task_id),
                    "user-id" => $_SESSION["user-id"]
                );
                var_dump($data);
                $this->model("Task");
                $this->model->updateRow($data);
            }else {
                echo "Please Fill All The Fields!";
            }
        }
        // update task status on drag
        public function updateTaskOnDrag() {
            extract($_POST);
            if(!empty($_POST["task_id"]) && !empty($_POST["task_status"])) {
                $data = array(
                    "task-id" => $this->validateData($task_id),
                    "task-status" => $this->validateData($task_status)
                );
                var_dump($data);
                $this->model("Task");
                $this->model->updateDragedRow($data);
            }else {
                echo 'id not found';
            }
        }
        // delete task
        public function deleteTask() {
            extract($_POST);
            if(!empty($_POST["task_id"])) {
                $this->model("Task");
                $this->model->deleteRow($this->validateData($task_id));
            }
        }

        // search tasks
        public function searchTasks() {
            extract($_POST);
            if(!empty($_POST["task_title"])) {
                $data = array(
                    "task-title" => '%'.$this->validateData($task_title).'%'
                );
                // var_dump($data);
                $this->model("Task");
                $tasks = $this->model->searchDataRows($data);
                echo json_encode($tasks);
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