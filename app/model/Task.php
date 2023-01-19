<?php
    class Task extends DB {
        public function insertData($data) {
            try {
                $stmt = $this->connect()->prepare("INSERT INTO `tasks` (task_title, task_description, task_status, date_end) VALUES (:title, :description, :status, :date_end)");
                $stmt->bindParam("title", $data["task-title"]);
                $stmt->bindParam("description", $data["task-desc"]);
                $stmt->bindParam("status", $data["task-status"]);
                $stmt->bindParam("date_end", $data["task-date"]);
                $stmt->execute();
            }catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        // get all tasks
        public function getAllData() {
            try {
                $stmt = $this->connect()->prepare("SELECT * FROM `tasks`");
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