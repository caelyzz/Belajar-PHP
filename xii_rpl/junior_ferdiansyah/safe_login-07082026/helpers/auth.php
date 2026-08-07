<?php

function startSession(){
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }
}

function isLogin(){
    startSession();
    return isset($_SESSION['user_id']);
}

function requiredLogin(){
    if(!isLogin()){
        header("Location: login.php");
        exit;
    }
}