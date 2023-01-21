<?php
    class Task extends DB {
        public function insertData($data) {
            try {
                $stmt = $this->connect()->prepare("INSERT INTO `tasks` (task_title,task_description,date_end,user_id,task_col_id) VALUES (:title, :description, :date_end, :user_id, :col_id)");
                $stmt->bindParam("title", $data["task-title"]);
                $stmt->bindParam("description", $data["task-desc"]);
                $stmt->bindParam("date_end", $data["task-date"]);
                $stmt->bindParam("user_id", $data["user-id"]);
                $stmt->bindParam("col_id", $data["column-id"]);
                $stmt->execute();
            }catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        // get all tasks
        public function getAllData($data) {
            try {
                $stmt = $this->connect()->prepare("SELECT * FROM `tasks` LEFT JOIN `tasks_columns` ON `tasks`.`task_col_id` = `tasks_columns`.`task_col_id` WHERE `tasks`.`user_id` = :user_id");
                $stmt->bindParam("user_id", $data["user-id"]);
                if($stmt->execute()) {
                    return $stmt->fetchAll();
                }
            }catch (PDOException $e) {
                return $e->getMessage(); 
            }
        }
        // get one row of data
        public function getRowData($id) {
            try {
                $stmt = $this->connect()->prepare("SELECT * FROM `tasks` WHERE task_id = :id");
                $stmt->bindParam(":id", $id);
                if($stmt->execute()) {
                    return $stmt->fetch();
                }
            }catch(PDOException $e) {
                return $e->getMessage();
            }
        }
    }
?>