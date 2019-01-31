<?php
    $imageExtensions = ['jpeg','gif','png'];
    $imageType = $_FILES['image']['type'];
    $imageSize = $_FILES['image']['size'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $imageMaxSize = 123425; // file size 123426  |||||| change to 123427

    if( $imageSize > $imageMaxSize ) {
        unset($_FILES['image']);
        echo 'Your file must be smaller than 120 kb.';
        var_dump($_FILES);
    } else{
        foreach ($imageExtensions as $value) {
            if($imageType == 'image/'.$value.''){
                echo 'Your File Successfully Uploaded.';
                var_dump($_FILES);
                move_uploaded_file($tmp_name,'D:/Arthur/WebDev/Tasks/Homework 5/uploaded/'.$value.'/daaaqweoane.jpg');
                break;
            }else{
                unset($_FILES['image']);
                echo 'You Can Upload Only Image File. <br> Extensions: jpg, gif, png.';
                var_dump($_FILES);
                break;
            }
        }
    }

?>