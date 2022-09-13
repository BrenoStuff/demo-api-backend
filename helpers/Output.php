<?php

class Output{
    // Proprieties

    // Methods
    function response($arrayResponse, $statusCode = 200) {
        http_response_code($statusCode);
        header('Content-Type: application/json; charset=utf-8');

        $allowed_hosts = array('foo.example.com', 'bar.example.com');
        if (!isset($_SERVER['HTTP_HOST']) || !in_array($_SERVER['HTTP_HOST'], $allowed_hosts)) {
            header($_SERVER['SERVER_PROTOCOL'].' 400 Bad Request');
            exit;
        }
        
        echo json_encode($arrayResponse);
        die;
    }

    function notFound(){
        $result['message'] = "API endpoint not found";
        $this->response($result, 404);
    }
}

?>