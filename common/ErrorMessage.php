<?php

    // error login
    define("ERR101_LOGIN_USER", "Vui lòng nhập vào Username");
    define("ERR102_LOGIN_PASSWORD", "Vui lòng nhập vào Password");
    define("ERR103_USER_404", "Username không tồn tại");
    define("ERR104_PASSWORD_FAILD", "Password nhập không chính xác");

    //error checkout
    

    function SetMessage($message){
        echo '<script>alert("'."$message".'")</script>';
    }

    function SetLocaltion($url){
        echo '<script>window.location="'.$url.'";</script>';
    }
?>
