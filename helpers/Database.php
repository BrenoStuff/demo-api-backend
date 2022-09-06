<?php


class Database{

    function connect(){
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

    function dbError($e){
        $result["error"]["message"] = "Server error, please try again!";
        $result["error"]["database"] = $e;
        $output = new Output();
        $output->response($result, 500);
    }
}



?>