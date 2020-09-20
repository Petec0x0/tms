<?php
    
    class Dbconn {
        private $host = "localhost";
        private $user = "trisjtsv_petec";
        private $password = "@Petecpassword1";
        private $dbname = "trisjtsv_tmsdb";
        
        protected function connect(){
            $pdo = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname, $this->user, $this->password);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        }
        
        public function shareConn(){
            return $this->connect();
        }
    }
    
    