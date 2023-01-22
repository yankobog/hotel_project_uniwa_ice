<!-- Contact form Page -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Επικοινωνία</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>

<body class="body">
    <div id="contact-page">
        <!-- Pulling User Navigation and Header-->
        <div id="topuserbar">
            <?php include ("includes/userbar.php"); ?>
        </div>

        <div id="navbar">
            <?php include ("includes/navigation.php"); ?>
        </div>

        <!-- Contact Form -->
        <h2>Επικοινωνία</h2>
        <div id=form-box>
            <form id="contact-form" action="contact_sent.php" method="POST">
                <div id="form-entry" class="user-name">
                    <label for="name">Όνομα</label>
                    <input type="text" name="name" id="name" placeholder="Εισάγετε το όνομά σας" required>
                </div>

                <div id="form-entry" class="user-surname">
                    <label for="surname">Επώνυμο</label>
                    <input type="text" name="surname" id="surname" placeholder="Εισάγετε το επώνυμό σας" required>
                </div>

                <div id="form-entry" class="user-email">
                    <label for="email">e-mail</label>
                    <input type="email" name="email" id="email" placeholder="mail@example.com" required>
                </div>

                <div id="form-entry" class="user-text">
                    <label for="text">Μήνυμα</label>
                    <textarea name="text" placeholder="Γράψτε το μήνυμά σας εδώ" required></textarea>
                </div>

                <div id="form-entry" class="user-submit">
                    <input type="submit" name="submit" value="Αποστολή">
                </div>
            </form>
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