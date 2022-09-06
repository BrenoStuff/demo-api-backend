<?php

class UserController{
    
    //Proprieties

    //Methods
    function signup(){
        // Get the entries
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = sha1($_POST['pass']);
        $avatar = $_POST['avatar'];
        
        // Validate the entries

        // Execute the query
        $user = new User(null, $name, $email, $pass, $avatar);
        $id = $user->create();

        // Return the result
        $result["success"]["message"] = "User created successfully!";

        $result["user"]["id"] = $id;
        $result["user"]["name"] = $name;
        $result["user"]["email"] = $email;
        $result["user"]["pass"] = $pass;
        $result["user"]["avatar"] = $avatar;

        // Give the html output
        $output = new Output();
        $output->response($result);
    }

}

?>