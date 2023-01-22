<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Complete</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>

<body class="body">
    <!-- Pulling User Navigation and Header-->
    <div id="topuserbar">
        <?php include ("includes/userbar.php"); ?>
    </div>

    <div id="navbar">
        <?php include ("includes/navigation.php"); ?>
    </div>

    <div id="reservation_sent-page">
        <div id="reservation_results">
            <h2>Reservation</h2>
            <?php
                    require('includes/db.php');
                    include("includes/auth_session.php");
                    //check whether submit button is pressed or not
                    if((isset($_POST['submit']))) {
                        
                        //fetching and storing the form data in variables
                        $username = ($_SESSION['username']);
                        $name = ($_POST['user-name']);
                        $surname = ($_POST['user-surname']);
                        $email = ($_POST['user-email']);
                        $number = ($_POST['user-number']);
                        $roomType = ($_POST["room-type"]);
                        $roomQTY = ($_POST["room-qty"]);
                        $dateStart = ($_POST['date_picker_start']);
                        $dateEnd = ($_POST['date_picker_end']);

                        //query to insert the variable data into the database
                        $sql="INSERT INTO reservations (username, user_name, user_surname, user_email, user_number, room, qty, date_start, date_end) 
                            VALUES ('".$username."', '".$name."','".$surname."', '".$email."', '".$number."', '".$roomType."', '".$roomQTY."', '".$dateStart."' , '".$dateEnd."' )";


                        $check_qty = mysqli_query($con, "SELECT * FROM rooms WHERE type='$roomType' AND available >='$roomQTY'");
                        if (mysqli_num_rows($check_qty)>0) {
                                //Execute the query and returning a message
                                if(!$result = $con->query($sql)){
                                    die('Error occured [' . $con->error . ']');
                                }
                                else{
                                    echo "<p style='color:black;'> Η κράτηση στάλθηκε επιτυχώς </p>";
                                    echo " <a href='dashboard.php'> Πατήστε εδώ για να δείτε τις κρατήσεις σας. </a>";  
                                }
                        }       
                        

                        else {
                            echo "<p style='color:black;'> Error: Input QTY is more than available</p>";
                            echo "<a href='reservation.php'> Δοκιμάστε ξανά. </a>";
                        }
                    }
                ?>



        </div>
    </div>
</body>

<footer class="footer">
    <?php
        include ("includes/footer.php");
    ?>
</footer>

</html>