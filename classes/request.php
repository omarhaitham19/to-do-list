<?php
namespace Route\classes;

class request{
    public function get($key){
        return isset($_GET[$key]) ? $_GET[$key] : null;
    }

    public function post($key){
        return isset($_POST[$key]) ? $_POST[$key] : null;
    }

    public function check($data){
        return isset($data);
    }

    public function filter($input){
        return trim(htmlspecialchars($input));
    }

    public function checkMethod($key){
        return $_SERVER['REQUEST_METHOD'];
    }

    public function redirect($file){
        return header("location:$file");
    }
    
}


