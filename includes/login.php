<?php

if (isset($_POST["submit"])) {
    $name = $_POST["user_name"];
    $psw = $_POST["password"];

    require_once("con_db.php");
    require_once("functions.php");

    if (emptyInputLogin($name, $psw)) {
        header("location: ../login_page.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $name, $psw);
} else {
    header("location:../login_page.php");
    exit();
}
