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
                <li><a href="index.php" id="home">Home</a></li>
                <?php
                    if(isset($_SESSION["userid"])){
                        echo"<li><a href='profile.php' id='profile'>Profile</a></li>";
                        echo"<li><a href='includes/logout.php' id='logout'>Logout</a></li>";
                    }else{
                        echo"<li><a href='login_page.php' id='login'>Login</a></li>";
                        echo"<li><a href='sign_up_page.php' id='sign_up'>Sign up</a></li>";
                    }
                ?>
            </ul>
        </nav>
    </header>

    <div class="main_content">
        <form action="includes/sign_up.php" method="post">
            <h2>Sign Up Form</h2>
            <input type="text" name="user_name" placeholder="Enter your username...">
            <input type="email" name="email" placeholder="Enter your email...">
            <input type="password" name="password" placeholder="Enter yout password...">
            <button type="submit" name="submit">Submit</button>

            <?php
                if (isset($_GET["error"])) {
                    $e = $_GET["error"];
                    switch ($e) {
                        case "emptyinput":
                            echo "<p>You have to fill all the fields.</p>";
                            break;
                        case "invalidusername":
                            echo "<p>Your user name have to start with a Capital Letter.</p>";
                            break;
                        case "invalidemail":
                            echo "<p>Your email is not valid.</p>";
                            break;
                        case "usernametaken":
                            echo "<p>The name of user has been already taken.</p>";
                            break;
                        case "stmtfailed":
                            echo "<p>Something went wrong. Try again.</p>";
                            break;
                        case "none":
                            echo "<p>Your account has been successfully created.</p>";
                            break;
                    }
                }
            ?>

        </form>
    </div>
</body>

</html>