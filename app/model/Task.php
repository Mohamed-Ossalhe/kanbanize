<?php
    class Task extends DB {
        public function insertData($data) {
            try {
                $stmt = $this->connect()->prepare("INSERT INTO `tasks` (task_title,task_description,date_end,user_id,task_status) VALUES (:title, :description, :date_end, :user_id, :status)");
                $stmt->bindParam("title", $data["task-title"]);
                $stmt->bindParam("description", $data["task-desc"]);
                $stmt->bindParam("date_end", $data["task-date"]);
                $stmt->bindParam("user_id", $data["user-id"]);
                $stmt->bindParam("status", $data["task-status"]);
                $stmt->execute();
            }catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        // get to do tasks
        public function getAllData($data) {
            try {
                $stmt = $this->connect()->prepare("SELECT * FROM `tasks` WHERE `tasks`.`user_id` = :user_id ORDER BY date_end DESC");
                $stmt->bindParam("user_id", $data["user-id"]);
                if($stmt->execute()) {
                    return $stmt->fetchAll();
                }
            }catch (PDOException $e) {
                return $e->getMessage(); 
            }
        }
        // get one row of data
        public function getRowData($data) {
            try {
                $stmt = $this->connect()->prepare("SELECT * FROM `tasks` WHERE task_id = :id AND user_id = :user_id");
                $stmt->bindParam("id", $data["task-id"]);
                $stmt->bindParam("user_id", $data["user-id"]);
                if($stmt->execute()) {
                    return $stmt->fetch();
                }
            }catch(PDOException $e) {
                return $e->getMessage();
            }
        }
        // update one row
        public function updateRow($data) {
            try {
                $stmt = $this->connect()->prepare("UPDATE `tasks` SET task_title = :title, task_description = :description, date_end = :date_end, task_status = :status WHERE task_id = :id");
                $stmt->bindParam("title", $data["task-title"]);
                $stmt->bindParam("description", $data["task-desc"]);
                $stmt->bindParam("date_end", $data["task-date"]);
                $stmt->bindParam("status", $data["task-status"]);
                $stmt->bindParam("id", $data["task-id"]);
                $stmt->execute();
            }catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        // delete one row of data
        public function deleteRow($id) {
            try{
                $stmt = $this->connect()->prepare("DELETE FROM `tasks` WHERE task_id = :id");
                $stmt->bindParam("id", $id);
                $stmt->execute();
            }catch(PDOException $e) {
                return $e->getMessage();
            }
        }

        // search data rows
        public function searchDataRows($data) {
            try {
                $stmt = $this->connect()->prepare("SELECT * FROM `tasks` WHERE task_title LIKE '%title%'");
                $stmt->bindParam("%:title%", $data["task-title"]);
                if($stmt->execute()) {
                    return $stmt->fetchAll();
                }
            }catch(PDOException $e) {
                return $e->getMessage();
            }
        }
    }
?>