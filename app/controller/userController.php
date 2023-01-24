<?php
    class userController extends Controller {
        // index: authentification view page
        public function index() {
            $this->authentification();
        }
        // profile :: user 
        public function profile() {
            $this->view("home/profile", "User Profile | Kanbanize");
            $this->view->render();
        }
        // get user data
        public function getUserInfo() {
            if(isUserLogged()) {
                $data = array(
                    "user-id" => $_SESSION["user-id"]
                );
                $this->model("User");
                $user_info = $this->model->getDataRow($data);
                echo json_encode($user_info);
            }
        }
        // authentification view page
        public function authentification() {
            if(!isUserLogged()) {
                $this->view("home/authentification", "Authentification | Kanbanize");
                $this->view->render();
            }else {
                redirect("home/");
            }
        }
        // Sign up
        public function signUp() {
            // echo "heloo";
            if(!empty($_FILES["user_image"]) && !empty($_POST["user_name"]) && !empty($_POST["user_email"]) && !empty($_POST["user_password"]) && !empty($_POST["role"])) {
                $imageName = $_FILES["user_image"]["name"];
                $oldDir = $_FILES["user_image"]["tmp_name"];
                $data = array(
                    "user-image" => $imageName,
                    "user-name" => $this->validateData($_POST["user_name"]),
                    "user-email" => filter_var($this->validateData($_POST["user_email"]), FILTER_SANITIZE_EMAIL),
                    "user-password" => password_hash($this->validateData($_POST["user_password"]), PASSWORD_DEFAULT),
                    "role" => $this->validateData($_POST["role"])
                );
                $newPath = ROOT. DIRECTORY_SEPARATOR . "public/assets/img/" . $imageName;
                move_uploaded_file($oldDir, $newPath);
                // var_dump($data);
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
                redirect("user/authentification");
            }
        }
        // update user info
        public function updateUserInfo() {
            if(isUserLogged()) {
                if(!empty($_FILES["user_image"]) && !empty($_POST["user_name"]) && !empty($_POST["user_email"]) && !empty($_POST["user_old_password"]) && !empty($_POST["user_new_password"])) {
                    $imageName = $_FILES["user_image"]["name"];
                    $oldDir = $_FILES["user_image"]["tmp_name"];
                    $data = array(
                        "user-image" => $imageName,
                        "user-name" => $this->validateData($_POST["user_name"]),
                        "user-email" => filter_var($this->validateData($_POST["user_email"]), FILTER_SANITIZE_EMAIL),
                        "user-old-password" => $this->validateData($_POST["user_old_password"]),
                        "user-password" => $this->validateData($_POST["user_new_password"])
                    );
                    $this->model("User");
                    $user = $this->model->verifyUser($data);
                    if(password_verify($data["user-old-password"], $user["user_password"])) {
                        // TODO: complette the logic and updte user info
                    }
                    // $newPath = ROOT. DIRECTORY_SEPARATOR . "public/assets/img/" . $imageName;
                    // move_uploaded_file($oldDir, $newPath);
                    // // var_dump($data);
                    // $this->model("User");
                    // $this->model->insertUser($data);
                }
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