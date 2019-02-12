<?php

function dd($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
    exit;
}

function redirect($url)
{
    header('Location: ' . $url);
    die();
}