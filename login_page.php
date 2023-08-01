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
        <form action="includes/login.php" method="post">
            <h2>Login</h2>
            <input type="text" name="user_name" placeholder="Enter your username or email...">
            <input type="password" name="password" placeholder="Enter yout password...">
            <button type="submit" name="submit">Submit</button>
            <?php
                if (isset($_GET["error"])) {
                    $e = $_GET["error"];
                    switch ($e) {
                        case "userdoesnexist":
                            echo "<p>The user doesn't exist</p>";
                            break;
                        case "wronglogin":
                            echo "<p>The username/email or the password are wrong.</p>";
                            break;
                        case "emptyinput":
                            echo "<p>You have to fill all the fields.</p>";
                            break;
                    }
                }
            ?>
        </form>
    </div>
</body>
</html>