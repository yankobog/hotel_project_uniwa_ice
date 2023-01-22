<?php
    // Requirements for database and authentication operations
    include("includes/auth_session.php");
    require('includes/db.php');

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Κράτηση</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
</head>

<body class="body">
    <div id="reservation-page">
        <!-- Pulling User Navigation and Header-->
        <div id="topuserbar">
            <?php include ("includes/userbar.php"); ?>
        </div>

        <div id="navbar">
            <?php include ("includes/navigation.php"); ?>
        </div>

        <!-- Reservation Form -->
        <h2>Κρατήσεις</h2>

        <div id="reservation-box">

            <div id="availability-table">
                <h4>Διαθεσιμότητα</h4>
                <?php                            
                    if(isset($_SESSION['username'])){
                        $query = "SELECT * FROM rooms";     
                        $result = mysqli_query($con, $query) or die(mysql_error($con)); 
                        echo    "<table border='1' id='reservation-list'>
                                <tr>
                                <th>Room ID</th>
                                <th>Room Type</th>
                                <th>No. of available Rooms</th>
                                </tr>";

                        if (!$result) die('Query failed: ' . mysqli_error($con)); 
                        while($row = mysqli_fetch_array($result)){ 
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['type'] . "</td>";
                            echo "<td>" . $row['available'] . "</td>";
                            echo "</tr>";   
                        }
                        echo "</table>";
                    }
                ?>
            </div>

            <div id=form-box>
                <form id="reservation-form" action="reservation_sent.php" method="POST">
                    <div id="form-entry" class="user-name">
                        <label for="user-name">Όνομα</label>
                        <input type="text" name="user-name" id="user-name" placeholder="Εισάγετε το όνομά σας" required>
                    </div>

                    <div id="form-entry" class="user-surname">
                        <label for="user-surname">Επώνυμο</label>
                        <input type="text" name="user-surname" id="user-surname" placeholder="Εισάγετε το επώνυμό σας"
                            required>
                    </div>

                    <div id="form-entry" class="user-email">
                        <label for="user-email">e-mail</label>
                        <input type="email" name="user-email" id="user-email" placeholder="mail@example.com" required>
                    </div>

                    <div id="form-entry" class="user-number">
                        <p style="font-size: 12px; color:white"><i>Phone number format: 0123456789</i></p>
                        <script>
                        function limit_num(element) {
                            var max_chars = 10;

                            if (element.value.length > max_chars) {
                                element.value = element.value.substr(0, max_chars);
                            }
                        }
                        </script>

                        <label for="user-number">Τηλέφωνο</label>
                        <input type="text" name="user-number" placeholder="Εισάγετε το τηλέφωνό σας" pattern="[0-9]{10}"
                            onkeydown="limit(this);" onkeyup="limit(this);" maxlength="10" required>
                    </div>

                    <div id="form-entry" class="room-selectr">
                        <label for="room-type2">Είδος Δωματίου</label>
                        <select name="room-type" id="room_type" onchange="myFunction()">
                            <option>Επιλέξτε Δωμάτιο</option>
                            <?php   
                                    //Pull from column type of rooms table and put it in an array 
                                    $query = "SELECT type FROM rooms";                              
                                    $stack = array(); 
                                    if ($r_set=$con->query($query)){
                                        while($row=$r_set->fetch_assoc()){    
                                            $stack[] = "$row[type]";
                                        }
                                        // Insert array as a dropdown selector
                                        foreach($stack as $item){
                                            echo "<option value='$item'>$item</option>";
                                        }
                                    }  
                                ?>
                        </select>
                    </div>

                    <div id="form-entry" class="room-qty">
                        <script>
                        function limit_qty(element) {
                            var max_chars = 2;

                            if (element.value.length > max_chars) {
                                element.value = element.value.substr(0, max_chars);
                            }
                        }
                        </script>
                        <label for="room-qty">Ποσότητα</label>
                        <input type="number" id="room-qty" name="room-qty" placeholder="1" pattern="[1-9]{2}"
                            onkeydown="limit_qty(this);" onkeyup="limit_qty(this);" maxlength="2" min="1" max="99"
                            required>
                    </div>



                    <!-- Datepicker with script to black past dates -->
                    <div id="form-entry" class="starting-date-select">
                        <label for="date_start">Ημερομηνία αρχής</label>
                        <input id="date_picker_start" name="date_picker_start" type="date" required>
                        <script language="javascript">
                        var today = new Date();
                        var dd = String(today.getDate()).padStart(2, '0');
                        var mm = String(today.getMonth() + 1).padStart(2, '0');
                        var yyyy = today.getFullYear();

                        today = yyyy + '-' + mm + '-' + dd;
                        $('#date_picker_start').attr('min', today);
                        </script>
                    </div>

                    <!-- Datepicker with script to black past dates -->
                    <div id="form-entry" class="ending-date-select">
                        <label for="date_end">Ημερομηνία τέλους</label>
                        <input id="date_picker_end" name="date_picker_end" type="date" required>
                        <script language="javascript">
                        var today = new Date();
                        var dd = String(today.getDate()).padStart(2, '0');
                        var mm = String(today.getMonth() + 1).padStart(2, '0');
                        var yyyy = today.getFullYear();

                        today = yyyy + '-' + mm + '-' + dd;
                        $('#date_picker_end').attr('min', today);
                        </script>
                    </div>
                    <div id="form-entry" class="user-submit">
                        <input type="submit" name="submit" value="Αποστολή">
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
<footer class="footer">
    <?php
        //Load Footer
        include ("includes/footer.php");
    ?>
</footer>

</html>