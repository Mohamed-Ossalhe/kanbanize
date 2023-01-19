<?php
    class User extends DB {
        // sign up statment
        public function insertUser($data) {
            try {
                $stmt = $this->connect()->prepare("INSERT INTO `users` (user_name, user_email, user_password, role) VALUES (:name, :email, :password, :role)");
                $stmt->bindParam("name", $data["user-name"]);
                $stmt->bindParam("email", $data["user-email"]);
                $stmt->bindParam("password", $data["user-password"]);
                $stmt->bindParam("role", $data["role"]);
                $stmt->execute();
            }catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        // Log In
        public function verifyUser($data) {
            try {
                $stmt = $this->connect()->prepare("SELECT * FROM `users` WHERE user_email = :email");
                $stmt->bindParam("email", $data["user-email"]);
                if($stmt->execute()) {
                    return $stmt->fetch();
                }
            }catch (PDOException $e) {
                return $e->getMessage();
            }
        }
    }
?>