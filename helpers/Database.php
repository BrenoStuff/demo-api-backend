<?php


class Database{

    function create(){
        $servername = "localhost";
        $database = "montapc"; 
        $username = "root"; 
        $password = ""; 
        
        try { 
        
            $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            return $conn;
        
        } catch(PDOException $e) {
            
        }
    }

    function dbError(){
        $error =  
    }
}



?>