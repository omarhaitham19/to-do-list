<?php 
namespace Route\classes;
use Route\classes\validator;
require_once "validator.php";

class str implements validator{
    public function check($key, $value)
    {
        if (is_numeric($value)) {
            return "$key must be string";
        }else{
            return false;
        }
    }

}