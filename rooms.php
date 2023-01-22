<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Δωμάτια</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>

<body class="body">

    <div id="topuserbar">
        <?php include ("includes/userbar.php"); ?>
    </div>

    <div id="navbar">
        <?php include ("includes/navigation.php"); ?>
    </div>




    <div id="slider-wrapper">
        <!-- Slideshow container -->
        <div class="slideshow-container">

            <!-- Full-width images with number and caption text -->
            <div class="mySlides fade">
                <div class="numbertext">1 / 8</div>
                <img src="images/rooms/1_single_simple.jpg" style="width:100%">
                <div class="text">1 Single Bed (Standard)</div>
            </div>

            <div class="mySlides fade">
                <div class="numbertext">2 / 8</div>
                <img src="images/rooms/1_single_luxury.jpg" style="width:100%">
                <div class="text">1 Single Bed (Luxury)</div>
            </div>

            <div class="mySlides fade">
                <div class="numbertext">3 / 8</div>
                <img src="images/rooms/2_single_simple.jpg" style="width:100%">
                <div class="text">2 Single Bed (Standard)</div>
            </div>

            <div class="mySlides fade">
                <div class="numbertext">4 / 8</div>
                <img src="images/rooms/2_single_luxury.jpg" style="width:100%">
                <div class="text">2 Single Bed (Luxury)</div>
            </div>

            <div class="mySlides fade">
                <div class="numbertext">5 / 8</div>
                <img src="images/rooms/1_double_simple.jpg" style="width:100%">
                <div class="text">1 Double Bed (Standard)</div>
            </div>

            <div class="mySlides fade">
                <div class="numbertext">6 / 8</div>
                <img src="images/rooms/1_double_luxury.jpg" style="width:100%">
                <div class="text">1 Double Bed (Luxury)</div>
            </div>

            <div class="mySlides fade">
                <div class="numbertext">7 / 8</div>
                <img src="images/rooms/2_double_simple.jpg" style="width:100%">
                <div class="text">2 Double Bed (Standard)</div>
            </div>

            <div class="mySlides fade">
                <div class="numbertext">8 / 8</div>
                <img src="images/rooms/2_double_luxury.jpg" style="width:100%">
                <div class="text">2 Double Bed (Luxury)</div>
            </div>

            <!-- Next and previous buttons -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <br>

        <!-- The dots/circles -->
        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
            <span class="dot" onclick="currentSlide(4)"></span>
            <span class="dot" onclick="currentSlide(5)"></span>
            <span class="dot" onclick="currentSlide(6)"></span>
            <span class="dot" onclick="currentSlide(7)"></span>
            <span class="dot" onclick="currentSlide(8)"></span>
        </div>
    </div>

    <script>
    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
    }
    </script>

    <div id="section-rooms-showcase">
        <?php 
        // Load Room Showcase
        include ("includes/rooms-showcase.php"); 
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