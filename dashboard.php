<?php
    // Requirements for database and authentication operations
    include("includes/auth_session.php");
    require('includes/db.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body class="body">
    <div id=dashboard-page>
        <!-- Pulling User Navigation and Header-->
        <div id="topuserbar">
            <?php include ("includes/userbar.php"); ?>
        </div>

        <div id="navbar">
            <?php include ("includes/navigation.php"); ?>
        </div>


        <h3> Πάνελ Χρήστη </h3>
        <div id=dashboard-landing>
            <p>Γεια σου, <?php echo $_SESSION['username']; ?>!</p>
            <!-- Showing reservations for logged in user from reservation table-->
            <p> Οι κρατήσεις μου</p>
            <div id=table-wrapper>
                <?php
                    if(isset($_SESSION['username'])){
                        $query = "SELECT * FROM reservations WHERE username= '".$_SESSION['username']."'";     
                        $result = mysqli_query($con, $query) or die(mysql_error($con)); 
                        echo    "<table border='1' id='reservation-list'>
                                <tr>
                                <th>Room</th>
                                <th>Qty</th>
                                <th>Starting Day</th>
                                <th>Ending Day</th>
                                </tr>";

                        if (!$result) die('Query failed: ' . mysqli_error($con)); 
                            while($row = mysqli_fetch_array($result)){ 
                                echo "<tr>";
                                echo "<td>" . $row['room'] . "</td>";
                                echo "<td>" . $row['qty'] . "</td>";
                                echo "<td>" . $row['date_start'] . "</td>";
                                echo "<td>" . $row['date_end'] . "</td>";
                                echo "</tr>";   
                            }
                        echo "</table>";
                    }
                ?>
            </div>

            <!-- Buttons -->
            <button type="button" id="button"><a href="reservation.php">Νέα Κράτηση</a></button>
            <button type="button" id="button"><a href="includes/logout.php">Αποσύνδεση</a></button>
        </div>
    </div>
</body>

<footer class="footer">
    <?php
        // Loaf Footer
        include ("includes/footer.php");
    ?>
</footer>

</html>