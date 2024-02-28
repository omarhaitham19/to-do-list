<?php
namespace Route\classes;

class session{
    public function __construct()
    {
         session_start();
    }

    public function destroy(){
         session_destroy();
    }

    public function set($key , $value){
        return $_SESSION[$key] = $value;
    }

    public function get($key){
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    public function remove($key){
        unset($_SESSION[$key]);
    }

    public function setNewId(){
        session_regenerate_id();
    }
    
}