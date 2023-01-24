<?php
    class User extends DB {
        // sign up statment
        public function insertUser($data) {
            try {
                $stmt = $this->connect()->prepare("INSERT INTO `users` (user_image,user_name,user_email,user_password,role) VALUES (:image,:name, :email, :password, :role)");
                $stmt->bindParam("image", $data["user-image"]);
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
        // get data row
        public function getDataRow($data) {
            try {
                $stmt = $this->connect()->prepare("SELECT * FROM `users` WHERE user_id = :id");
                $stmt->bindParam("id", $data["user-id"]);
                if($stmt->execute()) {
                    return $stmt->fetch();
                }
            }catch(PDOException $e) {
                return $e->getMessage();
            }
        }
        // update data row
        public function updateDataRow($data) {
            try {
                $stmt = $this->connect()->prepare("UPDATE `users` SET user_image = :image,user_name = :name,user_email = :email,user_password = :password WHERE user_id = :id");
                $stmt->bindParam("image", $data["user-image"]);
                $stmt->bindParam("name", $data["user-name"]);
                $stmt->bindParam("email", $data["user-email"]);
                $stmt->bindParam("password", $data["user-password"]);
                $stmt->bindParam("id", $data["user-id"]);
                $stmt->execute();
            }catch(PDOException $e) {
                return $e->getMessage();
            }
        }
    }
?>