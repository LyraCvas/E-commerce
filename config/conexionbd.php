<?php

    class Database
    {
        private $hostname = "localhost";
        private $database = "e_commercedb";
        private $username = "root";   
        private $password = "";     
        private $charset = "utf8";   

        function conectar()
        {
            try{
                $conn = "mysql:host=" . $this->hostname . "; dbname=" . $this->database . ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ];

            $pdo = new PDO($conn, $this->username, $this->password, $options);

            return $pdo;
            }
            

            catch (PDOException $e){
                echo 'error conn: ' . $e->getMessage();
                exit;
            }
    
        }
    }

?>