<?php

require_once "../helpers/auth.php";

startSession();

$_SESSION = [];

session_destroy();

header("Location: ../login.php");
exit;