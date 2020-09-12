<?php

    class View extends Model {
        public function checkAdmin($email){
            $results = $this->getAdmin($email);
            return $results;
        }
    }