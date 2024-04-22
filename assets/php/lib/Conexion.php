<?php
  ini_set('display_errors', '1');
  ini_set('display_startup_errors', '1');
  error_reporting(E_ALL);


  class Conexion{
        public $conn;

        public function connect(){
            try {
                $dataConecction = json_decode(file_get_contents('assets/json/conexion.json'), false); 
                $this->conn = mysqli_connect($dataConecction->server, $dataConecction->username, $dataConecction->password, $dataConecction->database);
            } catch (PDOException $e){
                var_dump($e);
                $this->conn = false;
            } 
        }

   }
?>