<?php
namespace Route\classes;
use Route\classes\required;
use Route\classes\str;
require_once "required.php";
require_once "str.php";

class validation{
    private $errors;
    public function endValidate($key , $value , $rules){
        foreach($rules as $rule){
            $rule ="Route\classes\\" . $rule;
            $obj = new $rule;
            $result = $obj->check($key , $value);
            if ($result != false) {
                $this->errors[] = $result;
            }
        }
    }

    public function getError(){
        return $this->errors;
    }
}