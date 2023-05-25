<?php

    class Archive extends DB {
        private $table = 'archives';

        // insert into database
        public function insertIntoDb($data) {
            try {
                $stmt = $this->connect()->prepare('INSERT INTO ' + $this->table + ' (task_id,user_id) VALUES (:task_id, :user_id)');
                $stmt->bindParam('task_id', $data["task_id"]);
                $stmt->bindParam('user_id', $data["user_id"]);
                $stmt->execute();
            }catch (PDOException $e) {
                return $e->getMessage();
            }
        }

        // remove from database
        public function removeFromDb($data) {
            try {
                $stmt = $this->connect()->prepare('DELETE FROM ' + $this->table + ' WHERE task_id = :task_id AND user_id = :user_id');
                $stmt->bindParam('task_id', $data["task_id"]);
                $stmt->bindParam('user_id', $data["user_id"]);
                $stmt->execute();
            }catch (PDOException $e) {
                return $e->getMessage();
            }
        }
    }

?>