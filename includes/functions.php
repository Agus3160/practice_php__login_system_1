<?php
//Returns true if at least on of the input fields is empty.
function emptyInputSignup($name, $email, $psw)
{
    return (empty($name) || empty($email) || empty($psw));
}

//Returns true if the username is invalid.
function invalidUserNameSignup($name)
{
    return !ctype_upper(str_split($name)[0]);
}

//Returns true if the email is invalid.
function invalidEmailSignup($username)
{
    return !filter_var($username, FILTER_VALIDATE_EMAIL);
}

//Returns true if the username already exits in the db. 
function userNameExist($conn, $name, $email)
{
    $sql = "SELECT * FROM db_php_practice WHERE user_name = ? OR user_email=?;"; //Setting the statement.
    $stmt = mysqli_stmt_init($conn);    //Init the connection with the db.

    //Testing the statement.
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../sign_up_page.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $name, $email); //load values to the statement
    mysqli_stmt_execute($stmt);

    $resultDb = mysqli_stmt_get_result($stmt); //Save the result of the stmt in resultDB.

    //I the user exits return the row of the user.
    if ($row = mysqli_fetch_assoc($resultDb)) {
        return $row;
    } else {
        return false;
    }
    mysqli_stmt_close($stmt);
}

//Returns true if the username already exits in the db. 
function createUser($conn, $name, $email, $psw)
{
    $sql = "INSERT INTO db_php_practice (user_name, user_email, psw) VALUES(?,?,?);"; //Setting the statement.
    $stmt = mysqli_stmt_init($conn);    //Init the connection with the db.

    //Testing the statement.
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../sign_up_page.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($psw, PASSWORD_DEFAULT); //Hash the password

    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashedPwd); //load values to the statement
    mysqli_stmt_execute($stmt);
    header("location:../sign_up_page.php?error=none");
    exit();
}

/***************** LOGIN FUNCTIONS **************************/

//It allows to know if some input fileds are empty.
function emptyInputLogin($name, $psw)
{
    return (empty($name) || empty($psw));
}

//Login the user.
function loginUser($conn, $name, $psw)
{
    $user = userNameExist($conn, $name, $name); //Check if the user exists.

    //If the user doesn't exist. show a message.
    if ($user === false) {
        header("location: ../login_page.php?error=userdoesnexist");
        exit();
    }

    //If the user exists, then it will get the user password and check it with the input password. 
    $pswHashed =  $user["psw"];
    $checkPsw = password_verify($psw, $pswHashed);

    //If they are the same, then the session will start.
    if ($checkPsw === true) {
        session_start();
        $_SESSION["userid"] = $user["user_name"];
        header("location: ../index.php");
        exit();
    //If they're not the same, it will show a message.
    } else if ($checkPsw === false) {
        header("location: ../login_page.php?error=wronglogin");
        exit();
    }
}