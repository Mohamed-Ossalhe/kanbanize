<?php
    class Column extends DB {
        // insert new column to database
        public function insertData($data) {
            try {
                $stmt = $this->connect()->prepare("INSERT INTO `tasks_columns`(task_col_name, col_user_id)VALUES(:column_name, :user_id)");
                $stmt->bindParam("column_name", $data["column-title"]);
                $stmt->bindParam("user_id", $data["column-user"]);
                $stmt->execute();
            }catch(PDOException $e) {
                return $e->getMessage();
            }
        }

        // get all coolumn data from database
        public function getAllData($data) {
            try {
                $stmt = $this->connect()->prepare("SELECT * FROM `tasks_columns` LEFT JOIN `users` ON `tasks_columns`.`col_user_id`=`users`.`user_id` WHERE `tasks_columns`.`col_user_id` = :user_id");
                $stmt->bindParam("user_id", $data["user-id"]);
                if($stmt->execute()) {
                    return $stmt->fetchAll();
                }
            }catch(PDOException $e) {
                return $e->getMessage();
            }
        }
    }
?>