<?php
class User {
    
    private $id;
    private $name;
    private $email;
    private $pass;
    private $avatar;

    function __construct($id, $name, $email, $pass, $avatar) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->pass = $pass;
        $this->avatar = $avatar;
    }

    function create(){
        $db = new Database();
        $conn = $db->connect();
        
        try{
            $stmt = $conn->prepare("INSERT INTO users (name, email, pass, avatar)
            VALUES (:name, :email, :pass, :avatar)");
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':pass', $this->pass);
            $stmt->bindParam(':avatar', $this->avatar);
            $stmt->execute();
            $id = $conn->lastInsertId();
            $conn = null;
            return $id;
        }catch(PDOException $e) {
            $db->dbError($e);
        }
    }

    function list(){
        $db = new Database();
        $conn = $db->connect();
        
        try{
            $stmt = $conn->prepare("SELECT id, name, email, avatar FROM users");
            $stmt->execute();
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $conn = null;
            return $users;
        }catch(PDOException $e) {
            $db->dbError($e);
        }
    }

    function byId(){
        $db = new Database();
        $conn = $db->connect();

        try{
            $stmt = $conn->prepare("SELECT id, name, email, avatar FROM users WHERE id = :id");
            $stmt->bindParam(':id', $this->id);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $conn = null;
            return $user;
        }catch(PDOException $e) {
            $db->dbError($e);
        }
    }

    function delete(){
        $db = new Database();
        $conn = $db->connect();
        
        try{
            $stmt = $conn->prepare("DELETE FROM users WHERE id = :id;");
            $stmt->bindParam(':id', $this->id);
            $stmt->execute();
            $rowsAffected = $stmt->rowCount();
            $conn = null;
            if($rowsAffected){
                return true;
            } else {
                return false;
            }
        }catch(PDOException $e) {
            $db->dbError($e);
        }
    }

    function update(){
        $conn = Database::connect();

        try{
            $stmt = $conn->prepare("UPDATE users SET name = :name, email = :email, avatar = :avatar WHERE id = :id");
            $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':avatar', $this->avatar);
            $stmt->execute();
            $rowsAffected = $stmt->rowCount();
            $conn = null;
            if($rowsAffected){
                return true;
            } else {
                return false;
            }
        }catch(PDOException $e) {
            Database::dbError($e);
        }
    }

    function login(){
        $db = new Database();
        $conn = $db->connect();

        try{
            $stmt = $conn->prepare("SELECT id FROM users WHERE email = :email AND pass = :pass");
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':pass', $this->pass);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $conn = null;
            if(is_array($user)){
                return $user['id'];
            } else {
                return false;
            }
        }catch(PDOException $e) {
            $db->dbError($e);
        }
    }
}
?>