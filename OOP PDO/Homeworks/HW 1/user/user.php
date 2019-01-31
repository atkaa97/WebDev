<?php

    class User{

        protected $firstname;
        protected $lastname;
        protected $age;

        public function __get($var){
            return $this->$var;
        }

        public function __set($varName,$value){
            return $this->$varName = $value;
        }
    }
    
?>