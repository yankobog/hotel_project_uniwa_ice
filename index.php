<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yet Another Hotel</title>
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

    <div id=section-main>
        <h1>Welcome to Yet Another Hotel</h1>

        <div id="landing-info-box">
            <h2> What is Lorem Ipsum? </h2>
            <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap
                into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the
                release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing
                software like Aldus PageMaker including versions of Lorem Ipsum. </p>
            <h2>Why do we use it?</h2>
            <p> It is a long established fact that a reader will be distracted by the readable content of a page when
                looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution
                of letters, as opposed to using 'Content here, content here', making it look like readable English. Many
                desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a
                search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have
                evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
            <button type="button" id="button"><a href="reservation.php">Καντε Κράτηση!</a></button>
        </div>
    </div>

    <div id="section-reception">
        <?php
            include ("includes/section-reception.php");
            ?>
    </div>

    <div id="section-restaurant">
        <?php
            include ("includes/section-restaurant.php");
            ?>
    </div>

    <div id="section-bedroom">
        <?php
            include ("includes/section-bedroom.php");
            ?>
    </div>

    <div id="section-sauna">
        <?php
            include ("includes/section-sauna.php");
            ?>
    </div>
</body>

<footer class="footer">
    <?php
        // Load Footer
        include ("includes/footer.php");
    ?>
</footer>

</html>