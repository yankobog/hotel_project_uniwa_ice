<?php
    // Requirements for database and authentication operations
    include("includes/admin_auth_session.php");
    require('includes/db.php');
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel: Yet Another Hotel</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <!-- Required js for calendar to block past dates on reservation-->
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
</head>

<body class="body">
    <div id="admin-page">
        <!-- Pulling User Navigation and Header-->
        <div id="topuserbar">
            <?php include ("includes/userbar.php"); ?>
        </div>

        <div id="navbar">
            <?php include ("includes/navigation.php"); ?>
        </div>

        <!-- If user has no admin permission redirect to the admin login page -->
        <?php
            if(($_SESSION['permission']) != "admin"){
                header("Location: admin_login.php");
            }
        ?>

        <div id=admin-landing>
            <h3> Πάνελ Διαχειριστή </h3>
            <p>Γειά σου, <?php echo $_SESSION['username']; ?>!</p>

            <div id='admin-table-wrapper'>
                <!-- View all reservations on the database -->
                <p> Kρατήσεις</p>
                <?php
                    if(isset($_SESSION['username'])){
                        $query = "SELECT * FROM reservations";     
                        $result = mysqli_query($con, $query) or die(mysql_error($con)); 
                        echo    "<table border='1' id='admin-reservation-table'>
                                <tr>
                                <th>id</th>
                                <th>Room</th>
                                <th>QTY</th>
                                <th>Starting Day</th>
                                <th>Ending Day</th>
                                <th>username</th>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Number</th>
                                <th>Email</th>
                                </tr>";

                        if (!$result) die('Query failed: ' . mysqli_error($con)); 
                            while($row = mysqli_fetch_array($result)){ 
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['room'] . "</td>";
                                echo "<td>" . $row['qty'] . "</td>";
                                echo "<td>" . $row['date_start'] . "</td>";
                                echo "<td>" . $row['date_end'] . "</td>";
                                echo "<td>" . $row['username'] . "</td>";
                                echo "<td>" . $row['user_name'] . "</td>";
                                echo "<td>" . $row['user_surname'] . "</td>";
                                echo "<td>" . $row['user_number'] . "</td>";
                                echo "<td>" . $row['user_email'] . "</td>";
                                echo "</tr>";   
                            }
                        echo "</table>";
                    }   
                ?>
            </div>


            <div id="form-wrapper">
                <div id="reservation-box">
                    <!-- Option to delete reservation based on ID -->
                    <div id=form-box>
                        <div id=from-box-sub-element>
                            <p>Διαγραφή εγγραφής με id: </p>
                            <form id="contact-form" action="delete_res.php" method="POST">
                                <div id="form-entry" class="id">
                                    <label for="name">ID</label>
                                    <input type="text" name="id" id="id" required>
                                </div>

                                <div id="form-entry" class="user-submit">
                                    <input type="submit" name="submit" value="Διαγραφή">
                                </div>
                            </form>
                        </div>

                        <div id=from-box-sub-element>
                            <p>Κατάσταση Δωματίων</p>
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


                    </div>


                    <!-- Option to add new reservation -->
                    <div id=form-box>
                        <p>Προσθέστε μια καταχώρηση: </p>
                        <form id="reservation-form" action="admin_reservation_sent.php" method="POST">
                            <div id="form-entry" class="user-name">
                                <label for="user-name">Όνομα</label>
                                <input type="text" name="user-name" id="user-name" placeholder="Εισάγετε το όνομά σας"
                                    required>
                            </div>

                            <div id="form-entry" class="user-surname">
                                <label for="user-surname">Επώνυμο</label>
                                <input type="text" name="user-surname" id="user-surname"
                                    placeholder="Εισάγετε το επώνυμό σας" required>
                            </div>

                            <div id="form-entry" class="user-email">
                                <label for="user-email">e-mail</label>
                                <input type="text" name="user-email" id="user-email" placeholder="mail@example.com"
                                    required>
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
                                <input type="text" name="user-number" placeholder="Εισάγετε το τηλέφωνό σας"
                                    pattern="[0-9]{10}" onkeydown="limit(this);" onkeyup="limit(this);" maxlength="10"
                                    required>
                            </div>

                            <div id="form-entry" class="room-type">
                                <label for="room-type2">Είδος Δωματίου</label>
                                <select name="room-type">
                                    <option selected="selected">Choose one</option>
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
                                    onkeydown="limit_qty(this);" onkeyup="limit_qty(this);" maxlength="2" min="1"
                                    max="99" required>
                            </div>

                            <!-- Datepicker with script to black past dates -->
                            <div id="form-entry" class="start-date">
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
                            <div id="form-entry" class="end-date">
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
                                <input type="submit" name="submit" value="Καταχώρηση">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- View all messages from contact table -->
            <div id="form-wrapper">
                <div id='admin-table-wrapper'>
                    <p> Μηνύματα</p>
                    <?php
                        if(isset($_SESSION['username'])){
                            $query = "SELECT * FROM contact";     
                            $result = mysqli_query($con, $query) or die(mysql_error($con)); 
                            echo    "<table border='1' id='admin-reservation-table'>
                                    <tr>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Surname</th>
                                    <th>email</th>
                                    <th>Message</th>
                                    </tr>";

                            if (!$result) die('Query failed: ' . mysqli_error($con)); 
                                while($row = mysqli_fetch_array($result)){ 
                                    echo "<tr>";
                                    echo "<td>" . $row['id'] . "</td>";
                                    echo "<td>" . $row['name'] . "</td>";
                                    echo "<td>" . $row['surname'] . "</td>";
                                    echo "<td>" . $row['email'] . "</td>";
                                    echo "<td>" . $row['message'] . "</td>";
                                    echo "</tr>";   
                                }
                            echo "</table>";
                        } 
                    ?>

                    <!-- Option to delete reservation based on ID -->
                    <div id="delete-box">
                        <div id=form-box>
                            <p>Διαγραφή μηνύματος με id: </p>
                            <form id="input-form" action="delete_msg.php" method="POST">
                                <div id="form-entry" class="id">
                                    <label for="name">ID</label>
                                    <input type="text" name="id" id="id" required>
                                </div>

                                <div id="form-entry" class="user-submit">
                                    <input type="submit" name="submit" value="Διαγραφή">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Logout Button -->
                <div id="logout-button">
                    <button type="button" id="button"><a href="includes/admin_logout.php">Αποσύνδεση</a></button>
                </div>
            </div>
        </div>
    </div>
</body>

<footer class="footer">
    <?php
        // Load Footer
        include ("includes/footer.php");
    ?>
</footer>

</html>