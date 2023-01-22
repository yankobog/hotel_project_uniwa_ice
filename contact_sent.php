<!-- Confirmation Page for successfull contact send -->

<?php
    // Requirements for database operations
    require('includes/db.php');
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Επικοινωνία</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>

<body class="body">
    <div id="contact_sent-page">
        <!-- Pulling User Navigation and Header-->
        <div id="topuserbar">
            <?php include ("includes/userbar.php"); ?>
        </div>

        <div id="navbar">
            <?php include ("includes/navigation.php"); ?>
        </div>

        <h2>Επικοινωνία</h2>
        <?php
            //check whether submit button is pressed or not
            if((isset($_POST['submit']))) {        
                //fetching and storing the form data in variables
                $name = ($_POST['name']);
                $surname = ($_POST['surname']);
                $email = ($_POST['email']);
                $text = ($_POST['text']);

                //query to insert the variable data into the database
                $sql="INSERT INTO contact (name, surname, email, message) 
                    VALUES ('".$name."','".$surname."', '".$email."', '".$text."')";

                //Execute the query and returning a message
                if(!$result = $con->query($sql)){
                    die('Error occured [' . $con->error . ']');
                }
                
                else
                    echo "<p style='color:black;'> Το μήνυμα στάλθηκε επιτυχώς </p>";
            }

        ?>
    </div>
</body>

<footer class="footer">
    <?php
        //Load Footer
        include ("includes/footer.php");
    ?>
</footer>

</html>