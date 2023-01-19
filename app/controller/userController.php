<?php
    class userController extends Controller {
        // index: authentification view page
        public function index() {
            $this->authentification();
        }
        // authentification view page
        public function authentification() {
            $this->view("home/authentification", "Authentification | Kanbanize");
            $this->view->render();
        }
        // Sign up
        public function signUp() {
            extract($_POST);
            if(!empty($_POST["user_name"]) && !empty($_POST["user_email"]) && !empty($_POST["user_password"]) && !empty($_POST["role"])) {
                $data = array(
                    "user-name" => $this->validateData($user_name),
                    "user-email" => filter_var($this->validateData($user_email), FILTER_SANITIZE_EMAIL),
                    "user-password" => password_hash($this->validateData($user_password), PASSWORD_DEFAULT),
                    "role" => $this->validateData($role)
                );
                $this->model("User");
                $this->model->insertUser($data);
            }
        }
        // log in
        public function logIn() {
            extract($_POST);
            if(!empty($_POST["user_email"]) && !empty($_POST["user_password"])) {
                $data = array(
                    "user-email" => filter_var($this->validateData($user_email), FILTER_SANITIZE_EMAIL),
                    "user-password" => $this->validateData($user_password)
                );
                $this->model("User");
                $user = $this->model->verifyUser($data);
                if($user && password_verify($data["user-password"],$user["user_password"])) {
                    $_SESSION["user-logged"] = true;
                    $_SESSION["user-name"] = $user["user_name"];
                    $_SESSION["user-email"] = $user["user_email"];
                    $_SESSION["user-id"] = $user["user_id"];
                    echo "user logged";
                }else {
                    echo "uncorrect email password";
                }
            }else {
                echo "Please Fill All The Fields!";
            }
        }
        // log out
        public function logOut() {
            if(session_destroy()) {
                header("location: " . $this->authentification());
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