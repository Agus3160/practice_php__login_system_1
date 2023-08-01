<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Login Practice</title>
</head>
<body>
    <header>
        <h1>Login Page</h1>
        <nav>
            <ul class="pages_nav">
                <div id="options">
                    <li><a href="index.PHP" id="home">Home</a></li>
                    <?php
                        if(isset($_SESSION["userid"])){
                            echo"<li><a href='profile.php' id='profile'>Profile</a></li>";
                            echo"<li><a href='includes/logout.php' id='logout'>Logout</a></li>";
                        }else{
                            echo"<li><a href='login_page.php' id='login'>Login</a></li>";
                            echo"<li><a href='sign_up_page.php' id='sign_up'>Sign up</a></li>";
                        }
                    ?>
                </div>
            </ul>
        </nav>
    </header>

    <div class="main_content">
        <div class="message_content">
            <?php
                if(isset($_SESSION["userid"])){
                    echo"<h2 id'message_h2'>OH YES!</h2>";
                    echo"<p id='message_p'>You are Logged :D</p>";
                }else{
                    echo"<h2 id'message_h2'>OH NO!</h2>";
                    echo"<p id='message_p'>You are not Logged :(</p>";
                }
            ?>
        </div>
    </div>

</body>

    <script src="js/javaScript.js"></script>

</html>