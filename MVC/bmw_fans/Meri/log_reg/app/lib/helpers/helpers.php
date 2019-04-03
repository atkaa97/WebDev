<?php
    function dd($data){
        echo '<pre>';
        var_dump($data);
        exit;
    }

    function sanitize($dirty){
        return htmlentities($dirty, ENT_QUOTES, 'UTF-8');
    }

    function currentUser(){
        return Users::currentLoggedInUser();
    }

    function posted_values($post){
        $clean_ary = [];
        foreach($post as $key => $value){
            $clean_ary[$key] = sanitize($value);
        }
        return $clean_ary;
    }