<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700&display=swap&subset=greek" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700&display=swap" rel="stylesheet">
    <!-- Custom Stylesheets -->
    <link rel="stylesheet" href="./stylesheets/index.css">
    <link rel="stylesheet" href="./stylesheets/elements.css">
    <script src="https://kit.fontawesome.com/d50f80a898.js" crossorigin="anonymous"></script>
    <title>Beyond Birmingham</title>
</head>

<body>
    <!-- Header Element -->
    <header class="navbar">
        
        <nav  >
            <li  ><a href="#aboutUs">About us</a></li>
            <li><a href="./shop.php">Merchandise</a></li>
            <li><a href="#footer">Contact us</a></li>
        </nav>
    </header>

    <!-- Hero Landing -->
    <section class="hero size100">
        <div class="background-image main"></div>
        <div class="hero-content-area">
        <h1 class="brand"> Beyond Birmingham </h1>
</div>
      
      
    </div>
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

    <!-- CONTACT SECTION -->
    <section class="contact">
        <h3 class="title">Learn more</h3>
        <p class="section-p">Want to be informed everytime something new comes up? Just sign up for our
            mailing list.No spam from us! Except if you are a true fan!
            </p>
        <hr>
        <!-- MAIL FORM -->
        <?php
            if(isset($_POST['submit'])){
               include("../src/helpers/mailSubscription.php");
            }
        ?>
        <form action="" class="form" method="POST">
            <input class="input" type="email" name="email" placeholder="Email">
            <input class="btn" type="submit" name="submit">
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