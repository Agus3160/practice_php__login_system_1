<?php
    session_start();    //Start the session.
    session_unset();    //Clears out the session.
    session_destroy();  //Destroy the session.

    header("location: ../index.php"); //Go to index
    exit();
?>