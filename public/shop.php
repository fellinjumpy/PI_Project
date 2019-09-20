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
<link rel="stylesheet"   href="./stylesheets/elements.css">
<link rel="stylesheet"   href="./stylesheets/shop.css">
<script src="https://kit.fontawesome.com/d50f80a898.js" crossorigin="anonymous"></script>
    <title>Beyond Birmingham</title>
</head>
<body>
    <div id="slide" class="alert">
        <span>Text</span>
    </div>
     <!-- Header Element -->
     <header class="navbar spaceb">
        <h2>Beyond Birmingham</h2>
        <nav>
            <li><a href="./index.php">Home</a></li>
            <li><a href="./shop.php">Merchandise</a></li>
            <li><a href=""><i class="fas fa-shopping-cart"></i>
            <span class='badge badge-warning' id='lblCartCount'> 5 </span>
            </a></li>
        </nav>
    </header>
    <section class=" shophero hero">
        <div class="shopBackground-image"></div>
        <div class="hero-content-area">
            <h1 class="brand">Merchandise!</h1>
            <h3>Go ahead take a look around</h3>
        </div>
    </section>
    <section class="shopContent">
        <?php
            include("../src/helpers/shopDb.php");
            $data = new Items();
            $data->connect();
            $items = $data->getAllItems();
            foreach ($items as $item) {
                echo "<div id=\"${item['id']} \" class=\"itemCard\">";
                echo "<img class=\"itemCardImg\" src='${item['eikona']}'/>".
                    "<div class=\"itemCardContent\">".
                        "<h2 class=\"itemCardHeader\">${item['titlos']} </h2>". 
                        "<p class=\"itemCardStock\">STOCK: ${item['apothema']}</p>". 
                        "<p class=\"itemCardPrice\">${item['timi']}</p>".
                        "<div class=\"itemCardIcons\">
                            <i   class=\"fas fa-heart icon fav\"></i>
                            <i   class=\"fas fa-cart-plus icon cart\"></i>
                        </div>".
                    "</div>"
                    ;
                echo "</div>";
                }
        ?>            
    </section>
    
    <script
			  src="https://code.jquery.com/jquery-3.4.1.js"
			  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
			  crossorigin="anonymous"></script>
    
    <script src="../src/javascript/shop.js"></script>
</body>
</html>
