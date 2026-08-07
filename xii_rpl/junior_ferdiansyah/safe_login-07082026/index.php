<?php

require_once "helpers/remember.php";

autoLogin();

startSession();

if(isset($_SESSION["user_id"])){
    header("Location: home.php");
} 
else{
    header("Location: login.php");
}

exit;