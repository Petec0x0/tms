<?php

    class Model extends Dbconn {
        protected function getAdmin($email){
            $sql = "SELECT * FROM adminprivileg WHERE email = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$email]);
            
            $results = $stmt->fetchAll();
            return $results;
        }
        
        protected function setCourse($new_course){
            $sql = "INSERT INTO courses (course_name) VALUES (?)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$new_course]);
        }
        
        public function getCourses(){
            $sql = "SELECT * FROM courses WHERE 1";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            
            $results = $stmt->fetchAll();
            return $results;
        }
    }
    
    // $sql = "UPDATE users SET dispensible = dispensible - ? WHERE email = ?";