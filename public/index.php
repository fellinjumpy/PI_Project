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
    <script src="https://kit.fontawesome.com/d50f80a898.js" crossorigin="anonymous"></script>
    <title>Band Name</title>
</head>

<body>
    <!-- Header Element -->
    <header class="navbar">
        <h2> Band Name </h2>
        <nav>
            <li><a href="#aboutUs">About us</a></li>
            <li><a href="./shop.php">Merchandise</a></li>
            <li><a href="#footer">Contact us</a></li>
        </nav>
    </header>
    <!-- Hero Landing -->
    <section class="hero size100">
        <div class="background-image main"></div>
    </section>

    <!-- TOURS SHOWS -->
    <section class="cta" id="aboutUs">
        <img  src="https://images.unsplash.com/photo-1471958680802-1345a694ba6d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1132&q=80" class="cta-image">
        <div class="cta-content">
            <h3 class="heading-m">Tours and Shows</h3>
            <p class="cta-p">Touring and giging in lots of different places
                is our thing! Wanna see us up close?! Check out 
                our tour and show dates!
            </p>
            <a class="btn" href="./tours.php">Read more</a>
        </div>
    </section>
    <!-- History and members -->
    <section class="cta">
        <img src="https://images.unsplash.com/photo-1518911710364-17ec553bde5d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=80" class="second cta-image ">
        <div class="cta-content align-s">
            <h3 class="heading-m">Our story.</h3>
            <p class="cta-p">You up for more details?.Want to read where-how-why we started
                this band and the whole story behind it? Want to read more about each and everyone of us?
                This is the place to do it!
            </p>
            <a class="btn" href="./history.html">Read more</a>
        </div>
    </section>

    <!-- <section class="aboutUs" id="aboutUs">
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
          </section> -->
    <!-- CONTACT SECTION -->
    <section class="contact">
        <h3 class="title">Learn more</h3>
        <p>Want to be informed everytime something new comes up? Just sign up for our
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
    <footer id="footer">
        <div class="footer-contact">
            <h3>Band Name</h3>
            
            <ul>
                <li><a href="#"><i class="fab fa-twitter "></i> </a></li>
                <li><a href="#"><i class="fab fa-facebook "></i> </a></li>
                <li><a href="#"><i class="fab fa-snapchat "></i> </a></li>
            </ul>     
        </div>
        <div class="footer-rights">
            <p>Images courtesy of <a href="http://unsplash.com/">unsplash</a>.</p>
        </div>
    </footer>
     
    
</body>

</html>