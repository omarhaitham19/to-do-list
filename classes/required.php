<?php
namespace Route\classes;
use Route\classes\validator;
require_once "validator.php";

class required implements validator{
    public function check($key , $value){

        if (empty($value)) {
            return "$key is required";
        }else{
            return false;
        }

    }
}