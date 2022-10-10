<?php
class AuthController{
    public function login(){
        Router::allowedMethod('POST');

        $data = Input::getData();
        $email = $data['email'];
        $pass = sha1($data['pass']);

        $user = new User(null, null, $email, $pass, null);
        $idUser = $user->login();

        if($idUser){
            $token = sha1(uniqid(rand(), true));
            $client = $_SERVER['HTTP_USER_AGENT'];
            $session = new Session(null, $idUser, $token, $client);
            $idSession = $session->create();
            if($idSession){
                $result["success"]["message"] = "User logged in successfully!";
                $result["data"]["token"] = $token;
                Output::response($result);
            } else {
                $result["error"]["message"] = "Error creating the session!";
                Output::response($result, 500);
            }
        } else {
            $result["error"]["message"] = "Email or Password invalid! Please try again.";
            Output::response($result, 401);
        }
    }

    public function logout(){
        Router::allowedMethod('POST');

        $data = Input::getData();
        $token = $data['token'];
        $idUser = $data['idUser'];

        $session = new Session(null, $idUser, $token, null);
        $wasDeleted = $session->delete();

        if($wasDeleted){
            $result["success"]["message"] = "User logged out successfully!";
            Output::response($result);
        } else {
            $result["error"]["message"] = "Error logging out the session!";
            Output::response($result, 500);
        }
    }
}
?>