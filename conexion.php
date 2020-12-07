<?php
    class db{
        private $serv = "localhost";
        private $base = "examen";
        private $user = "root";
        private $pass = "";
        public $connect = null;
        public function __construct(){
            
            try {
                $this->connect = new PDO('mysql:host='.$this->serv.';
                dbname='.$this->base,
                $this->user,
                $this->pass);
                $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->connect->query("SET NAMES 'utf8'");
            } catch (Exception $ex) {
                echo "Error de conexion". $ex->getMessage();
            }
        }
        public function close(){
            $this->connect = null;
        }
        
    }
    
    ?>