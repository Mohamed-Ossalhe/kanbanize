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
        // archives :: user
        public function archives() {
            $this->view("home/archives", "Tasks Archives | kanbanize");
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
            $regexPatterns = array(
                "email" => '/^([a-z\d\.-]+)@([a-z\d-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/',
                "password"=> '/^[\w@-]{8,20}$/',
                "name" => '/^[A-Za-z\d ]{5,20}$/'
            );
            // echo "heloo";
            if(!empty($_FILES["user_image"]) && !empty($_POST["user_name"]) && !empty($_POST["user_email"]) && !empty($_POST["user_password"]) && !empty($_POST["role"])) {
                if(preg_match($regexPatterns["name"], $_POST["user_name"]) && preg_match($regexPatterns["email"], $_POST["user_email"]) && preg_match($regexPatterns["password"], $_POST["user_password"])) {
                    $this->model("User");
                    $imageName = $_FILES["user_image"]["name"];
                    $oldDir = $_FILES["user_image"]["tmp_name"];
                    $data = array(
                        "user-image" => $imageName,
                        "user-name" => $this->validateData($_POST["user_name"]),
                        "user-email" => filter_var($this->validateData($_POST["user_email"]), FILTER_SANITIZE_EMAIL),
                        "user-password" => password_hash($this->validateData($_POST["user_password"]), PASSWORD_DEFAULT),
                        "role" => $this->validateData($_POST["role"])
                    );
                    $user = $this->model->verifyUser($data);
                    if($user) {
                        echo "Email Already Exists!";
                    }else {
                        $newPath = ROOT. DIRECTORY_SEPARATOR . "public/assets/img/" . $imageName;
                        move_uploaded_file($oldDir, $newPath);
                        $this->model->insertUser($data);
                        echo "success";
                        // redirect("user/authentification");
                    }
                }else {
                    echo "Please Enter Valid Informations";
                }
            }else {
                echo "Please Fill All The Fields!";
            }
        }
        // log in
        public function logIn() {
            extract($_POST);
            if(!empty($_POST["user_email"]) && !empty($_POST["user_password"])) {
                $regexPatterns = array(
                    "email" => '/^([a-z\d\.-]+)@([a-z\d-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/',
                    "password"=> '/^[\w@-]{8,20}$/'
                );
                if(preg_match($regexPatterns["email"], $user_email) && preg_match($regexPatterns["password"], $user_password)) {
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
                        // redirect("/");
                    }else {
                        echo "uncorrect email or password";
                    }
                }else {
                    echo "Please Enter Valid Informations!";
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
                if(!empty($_POST["user_name"]) && !empty($_POST["user_email"]) && !empty($_POST["user_old_password"]) && !empty($_POST["user_new_password"])) {
                    $data = array();
                    if(!empty($_FILES["user_image"])) {
                        $imageName = $_FILES["user_image"]["name"];
                        $oldDir = $_FILES["user_image"]["tmp_name"];
                        $data = array(
                            "user-image" => $imageName,
                            "user-name" => $this->validateData($_POST["user_name"]),
                            "user-email" => filter_var($this->validateData($_POST["user_email"]), FILTER_SANITIZE_EMAIL),
                            "user-old-password" => $this->validateData($_POST["user_old_password"]),
                            "user-password" => password_hash($this->validateData($_POST["user_new_password"]), PASSWORD_DEFAULT),
                            "user-id" => $_SESSION["user-id"]
                        );
                    }else {
                        $data = array(
                            "user-name" => $this->validateData($_POST["user_name"]),
                            "user-email" => filter_var($this->validateData($_POST["user_email"]), FILTER_SANITIZE_EMAIL),
                            "user-old-password" => $this->validateData($_POST["user_old_password"]),
                            "user-password" => password_hash($this->validateData($_POST["user_new_password"]), PASSWORD_DEFAULT),
                            "user-id" => $_SESSION["user-id"]
                        );
                    }
                    $this->model("User");
                    $user = $this->model->verifyUser($data);
                    if($user && password_verify($data["user-old-password"], $user["user_password"])) {
                        $newPath = ROOT. DIRECTORY_SEPARATOR . "public/assets/img/" . $imageName;
                        move_uploaded_file($oldDir, $newPath);
                        // var_dump($data);
                        $this->model->updateDataRow($data);
                    }else {
                        echo "Invalid Password";
                    }
                }else {
                    echo "Please Fill All Feilds!";
                }
            }else {
                redirect("authentification");
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