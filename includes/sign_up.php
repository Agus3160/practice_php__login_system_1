<?php 
    if(isset($_POST["submit"])){

        //Save the inputs values:
        $name = $_POST["user_name"];
        $email = $_POST["email"];
        $psw = $_POST["password"];
        
        //Use the other functions;
        require_once 'con_db.php';
        require_once 'functions.php';

        //Validate the inputs
        if (emptyInputSignup($name, $email, $psw) !== false){
            header("location: ../sign_up_page.php?error=emptyinput");
            exit();
        }

        if (invalidUserNameSignup($name) !== false){
            header("location: ../sign_up_page.php?error=invalidusername");
            exit();
        }

        if (invalidEmailSignup($email) !== false){
            header("location: ../sign_up_page.php?error=invalidemail");
            exit();
        }

        if (userNameExist($conn, $name, $email) !== false){
            header("location: ../sign_up_page.php?error=usernametaken");
            exit();
        }

        //Create the User:
        createUser($conn, $name, $email, $psw);

    }else{
        header("location: ../sign_up_page.php");
    }