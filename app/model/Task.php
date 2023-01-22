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
        public function getToDoData($data) {
            try {
                $stmt = $this->connect()->prepare("SELECT * FROM `tasks` WHERE `tasks`.`user_id` = :user_id AND `tasks`.`task_status` = 'to do'");
                $stmt->bindParam("user_id", $data["user-id"]);
                if($stmt->execute()) {
                    return $stmt->fetchAll();
                }
            }catch (PDOException $e) {
                return $e->getMessage(); 
            }
        }
        // get in progress tasks
        public function getInProgressData($data) {
            try {
                $stmt = $this->connect()->prepare("SELECT * FROM `tasks` WHERE `tasks`.`user_id` = :user_id AND `tasks`.`task_status` = 'in progress'");
                $stmt->bindParam("user_id", $data["user-id"]);
                if($stmt->execute()) {
                    return $stmt->fetchAll();
                }
            }catch (PDOException $e) {
                return $e->getMessage(); 
            }
        }
        // get done tasks
        public function getDoneData($data) {
            try {
                $stmt = $this->connect()->prepare("SELECT * FROM `tasks` WHERE `tasks`.`user_id` = :user_id AND `tasks`.`task_status` = 'done'");
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
    }
?>