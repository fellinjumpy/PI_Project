<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700&display=swap&subset=greek" rel="stylesheet">

    <!-- Custom Stylesheets -->
    <link rel="stylesheet" href="./stylesheets/index.css">
    <link rel="stylesheet" href="./stylesheets/elements.css">
    <title>Band Name</title>
</head>

<body>
    <!-- Header Element -->
    <header class="navbar">
        <h2> Band Name </h2>
        <nav>
            <li><a href="#aboutUs">About us</a></li>
            <li><a href="./shop.php">Merchandise</a></li>
            <li><a href="">Contact us</a></li>
        </nav>
    </header>
    <!-- Hero Landing -->
    <section class="hero">
        <div class="background-image"></div>
    </section>

    <section class="cta">
        <h3>CTA</h3>
    </section>

    <section class="aboutUs" id="aboutUs">
            <h3 class="title">About us</h3>
            <p>Wanna know more about us? See below! </p>
            <hr>
        
            <ul class="grid">
              <li class="members">
                <i class="fa fa-compass fa-4x"></i>
                <h4>Members</h4>
                <p>Meet the band members! We are lots of talented people the came up together to form this band!</p>
              </li>
              <li class="albums">
                <i class="fa fa-camera-retro fa-4x"></i>
                <h4>Albums</h4>
                <p>We have created many albums in the past! And we promise we will continue to create more! Check them out here!</p>
              </li>
              <li class="tours">
                <i class="fa fa-bicycle fa-4x"></i>
                <h4>Tours</h4>
                <p>Tours are our favourite thing! Want to see us up close? Listen to our music live? See us perform on stage?! Check out our tours here!</p>
              </li>
              <li class="shows">
                <i class="fa fa-flag-checkered fa-4x"></i>
                <h4>Shows</h4>
                <p>Our past and upcoming shows from small to huge! Check the dates here! </p>
              </li>
            </ul>
          </section>
    <!-- CONTACT SECTION -->
    <section class="contact">
        <h3 class="title">Learn more</h3>
        <p>Want to know about our upcoming shows and tours? Just sign up for our
            mailing list.No spam from us! Except if you are a true fan!
            </p>
        <hr>
        <!-- MAIL FORM -->
        <?php
            if(isset($_POST['submit'])){
               include("../src/helpers/mailSubscription.php");
            }
        ?>
        <form action="" method="POST">
            <input type="email" name="email" placeholder="Email">
            <input class="btn" type="submit" name="submit"> </input>
        </form>
        
    </section>
    <!-- FOOTER  -->
    <footer>
        <p>Images courtesy of <a href="http://unsplash.com/">unsplash</a>.</p>
        <p>Copyright paragraph of who what and how</p>
        <ul>
            <li><a href="#"><i class="fa fa-twitter-square fa-2x"></i></a></li>
            <li><a href="#"><i class="fa fa-facebook-square fa-2x"></i></a></li>
            <li><a href="#"><i class="fa fa-snapchat-square fa-2x"></i></a></li>
        </ul>
    </footer>
     
    
</body>

</html>