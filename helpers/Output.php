<?php

class Output{
    // Proprieties

    // Methods
    function response($arrayResponse, $statusCode = 200) {
        header('Content-Type: application/json; charset=utf-8');
        header("Access-Control-Allow-Origin: " . ALLOWED_HOSTS);
        http_response_code($statusCode);
        echo json_encode($arrayResponse);
        die;
    }

    function notFound(){
        $result['message'] = "API endpoint not found";
        $this->response($result, 404);
    }
}

?>