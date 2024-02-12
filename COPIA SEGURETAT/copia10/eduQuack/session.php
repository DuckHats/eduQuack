<?php
//start the session
session_start();

//if user is loged in redirect
if (isset($_SESSION["userid"]) && $_SESSION["userid"] === true) {
    header("location: index.php");
    exit;
}
