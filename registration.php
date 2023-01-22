<?php
    // Requirements for database operations
    require('includes/db.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Registration</title>
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
            // When form submitted, insert values into the database.
            if (isset($_REQUEST['username'])) {
                $username = $_REQUEST['username'];
                $email    = $_REQUEST['email'];
                $password = $_REQUEST['password'];
                $name     = $_REQUEST['name'];
                $surname  = $_REQUEST['surname'];
                $number   = $_REQUEST['number'];
                $create_datetime = date("Y-m-d H:i:s");
                $permission = "user";
                
                /* Hashed Password */
                $query    = "INSERT into `user` (username, name, surname, email, password, number, create_datetime, permission)
                            VALUES ('$username', '$name', '$surname', '$email', '" . md5($password) . "', '$number', '$create_datetime', '$permission')";

                /* Raw Password 
                $query    = "INSERT into `user` (username, name, surname, email, password, number, create_datetime, permsission)
                VALUES ('$username', '$name', '$surname', '$email', '$password', '$number', '$create_datetime', '$permission')";            
                */


                //Checking for duplicate username or email before continuing
                $check_duplicates = mysqli_query($con, "select * from user where username='$username' or email='$email'");

                if (mysqli_num_rows($check_duplicates)>0) {
                    echo 
                    "<script>
                        alert('Username or email already exists');
                        window.location.href='registration.php';
                    </script>";
                }
                else{
                    $result = mysqli_query($con, $query);
                }


                if ($result) {
                    echo 
                    "<div class='form'>
                        <h3>You are registered successfully.</h3><br/>
                        <p class='link'>Click here to <a href='login.php'>Login</a></p>
                    </div>";

                } else {
                    echo 
                    "<div class='form'>
                        <h3>Required fields are missing.</h3><br/>
                        <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                    </div>";
                }
            } 
            
            else {
        ?>
    <!-- User Registration Form -->
    <form class="form" action="" method="post">
        <h1 class="login-title">Εγγραφή Χρήστη</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" maxlength="50" required />
        <input type="email" class="login-input" name="email" placeholder="e-mail" maxlength="50" required>
        <input type="password" class="login-input" name="password" placeholder="Κωδικός" maxlength="50" required>
        <input type="text" class="login-input" name="name" placeholder="Όνομα" maxlength="50">
        <input type="text" class="login-input" name="surname" placeholder="Επώνυμο" maxlength="50">
        <i>Phone number format: 0123456789</i>
        <input type="tel" class="login-input" name="number" placeholder="Τηλέφωνο" pattern="[0-9]{10}">
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link"><a href="login.php">Σελίδα Σύνδεσης</a></p>
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