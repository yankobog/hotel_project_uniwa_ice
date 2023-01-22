<?php
    // Requirements for database and authentication operations
    session_start();
    require('includes/db.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body class="body">
    <!-- Pulling User Navigation and Header-->
    <div id="topuserbar">
        <?php include ("includes/userbar.php"); ?>
    </div>

    <div id="navbar">
        <?php include ("includes/navigation.php"); ?>
    </div>

    <?php
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = $_REQUEST['username']; 
        $password = $_REQUEST['password'];
        // Check if user exist in the database and is admin
        $query    = "SELECT * FROM `user` WHERE username='$username' AND password='" . md5($password) . "' AND permission='admin'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        
        // If Query is successfull input in session that the user is admin
        if ($rows == 1) {
            $_SESSION["username"] = $username;
            $_SESSION["permission"] = "admin";
            // Redirect to admin page
            header("Location: admin.php");
        } else {
            echo "<h4>Incorrect Username or Password.</h4><br/>
                  <p class='link'>Click here to <a href='./admin_login.php'>Login</a> again.</p>";
        }
    } 
    
    else {
    ?>
    <!-- Admin Login Form -->
    <form class="form" method="post" name="login">
        <h1 class="login-title">Σύνδεση Διαχειριστή</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true" />
        <input type="password" class="login-input" name="password" placeholder="Password" />
        <input type="submit" value="Login" name="submit" class="login-button" />
        <p class="link"><a href="admin_registration.php">Εγγραφή Νέου Διαχειριστή</a></p>
    </form>
    <?php } ?>
</body>

<footer class="footer">
    <?php
        // Load Footer
        include ("includes/footer.php");
    ?>
</footer>

</html>