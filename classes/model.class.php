<?php

    class Model extends Dbconn {
        protected function getAdmin($email){
            $sql = "SELECT * FROM adminprivileg WHERE email = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$email]);
            
            $results = $stmt->fetchAll();
            return $results;
        }
        
        public function getCourses(){
            $sql = "SELECT * FROM courses WHERE 1";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            
            $results = $stmt->fetchAll();
            return $results;
        }
    }