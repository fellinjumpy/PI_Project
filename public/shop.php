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
    <section class="shopContent"  >
        <!-- To be filled by jquery with data from DB -->
        <!-- <div id="1" class="itemCard">
            <div class="itemCardImgContainer">
                <img class="itemCardImg" src="https://images.unsplash.com/photo-1507041957456-9c397ce39c97?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=634&amp;q=80">
                <span class="itemCardFavIcon fa-stack fa-2x">
                    <i class="fas fa-heart fa-stack-1x solid" aria-hidden="true"></i>
                    <i class="far fa-heart fa-stack-1x outline" aria-hidden="true"></i>
                </span>
                <h2 class="itemCardHeader2">Album v1 CD</h2>
                <p class="itemCardStock2">In Stock: 40</p>
            </div>
            <div class="itemCardContent">
                 <h2 class="itemCardHeader">Album v1 CD</h2>
                <p class="itemCardStock">In Stock: 40</p> 
                <p class="itemCardPrice2">6.30 €</p>
            </div> -->
        </div>
    </section>
    <!-- Item Details -->

        <section class="itemDetailSection" >
        <div class="itemCard" id="4">
                       <img class="itemDetailCardImg" src="https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=800&amp;q=80" alt="">
                       <div class="itemDetailContent">
                            <h2 class="detailHeader heading-m">T-Shirt</h2>
                            <p class="itemCardDescription">Morbi sollicitudin auctor odio, non elementum felis molestie at. Donec dignissim imperdiet tempor. Nulla augue libero, tempus sed fringilla id</p>
                            <p class="detailStock">89 Left in stock!</p>
                            <div class ="itemChoices">
                            <div class="itemDetailCardAmount">
                                <button id="down" type="button" onclick="this.parentNode.querySelector('[type=number]').stepDown();" class="stepButton">
                                    -
                                </button>

                                <input type="number" name="number" min="1" max="89" value="1" class="detailInput">

                                <button id="up" type="button" onclick="this.parentNode.querySelector('[type=number]').stepUp();" class="stepButton">
                                    +
                                </button>
                            </div>
                            <p class="itemCardPrice">19.30 €</p>
                            </div>
                            <div class="itemCardIcons">
                                <button class="addtoF addtoC"> 
                                     <i class="fas fa-heart " aria-hidden="true"></i>
                                </button>
                                <!-- <i class="fas fa-cart-plus icon cart" aria-hidden="true"></i> -->
                                <button class="addtoC cart">Add to Cart</button>
                            </div>
                       </div>
                       <i class="fas fa-times cancel" aria-hidden="true"></i>
                </div>

        </section>
    

    <!-- CART -->
    <div id="userCart" class="userCart">
            <!-- Modal content -->
            <div class="userCart-Content">
                <span class="close">&times;</span>
                <p>Your Cart</p>
                <div class="table-container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Amount</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody class="table-body">
                              <tr>
                                <!-- <td>1</td>
                                <td>Item Title</td>
                                <td> <input type="number" min=1 value=1 class="itemAmount"> </td>
                                <td>123.52</td> -->
                            </tr>  
                        </tbody>
                    </table>
                </div>
                <div class="cartInfo">
                        <p>TOTAL</p>
                    </div>
                <div class="cartBottom">
                    <div class="cartUserOptions">
                        <button>Check Out</button>
                    </div>
                    
                </div>
            </div>

    </div>


    <script
			  src="https://code.jquery.com/jquery-3.4.1.js"
			  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
			  crossorigin="anonymous"></script>
    <script src ='../src/javascript/item.js'></script>
    <script src="../src/javascript/shop.js"></script>
</body>
</html>
