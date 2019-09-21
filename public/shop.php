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
            <li id="userCartBtn"><a href="#" ><i class="fas fa-shopping-cart"></i>
            <span class='badge badge-warning' id='lblCartCount'> 5 </span>
            </a></li>
        </nav>
    </header>
    <!-- SHOP Hero -->
    <section class=" shophero hero">
        <div class="shopBackground-image"></div>
        <div class="hero-content-area">
            <h1 class="brand">Merchandise!</h1>
            <h3>Go ahead take a look around</h3>
        </div>
    </section>
    <!-- Shop content -->
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
    <!-- Item Details -->

    <section class="itemDetailSection">
                <div class="itemCard" id="">
                       <img class="itemDetailCardImg" src="https://images.unsplash.com/photo-1437153225860-b850e2a4d0fa?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80" alt="">
                       <div class="itemDetailContent">
                            <h2 class="itemCardHeader heading-m">Item Title</h2>
                            <p class="itemCardDescription">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quia assumenda aliquid vitae praesentium, laborum laboriosam eum delectus iusto labore! Unde non ducimus aut explicabo culpa aliquam voluptas quia laboriosam molestias.</p>
                            <p class="itemCardStock">Stock</p>
                            <p class="itemCardPrice">PRICE!!</p>
                            <div class="itemCardIcons">
                                <i   class="fas fa-heart icon fav"></i>
                                <i   class="fas fa-cart-plus icon cart"></i>
                            </div>
                       </div>
                       <i class="fas fa-times cancel"></i>
                </div>
                
    </section>

    <!-- CART -->
    <div id="userCart" class="userCart">

            <!-- Modal content -->
            <div class="userCart-Content">
                <span class="close">&times;</span>
                <p>Your Cart</p>
            </div>

    </div>
    <script
			  src="https://code.jquery.com/jquery-3.4.1.js"
			  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
			  crossorigin="anonymous"></script>
    
    <script src="../src/javascript/shop.js"></script>
</body>
</html>
