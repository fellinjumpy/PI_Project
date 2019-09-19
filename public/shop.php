<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <!-- Fonts -->
     <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700&display=swap&subset=greek" rel="stylesheet">
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

<!-- Custom Stylesheets -->
<link rel="stylesheet" href="./stylesheets/index.css">
<link rel="stylesheet"   href="./stylesheets/elements.css">
<link rel="stylesheet"   href="./stylesheets/shop.css">
    <title>Document</title>
</head>
<body>
     <!-- Header Element -->
     <header class="navbar">
        <h2> Band Name </h2>
        <nav>
            <li><a href="./index.php">Home</a></li>
            <li><a href="./shop.php">Merchandise</a></li>
            <li><a href=""><i class="material-icons">shopping_cart</i></a></li>
        </nav>
    </header>
    <section class=" shophero hero">
        <div class="shopBackground-image"></div>
    </section>
    <section class="shopContent">
        <?php
            include("../src/helpers/shopDb.php");
            $data = new Items();
            $data->connect();
            $items = $data->getAllItems();
            foreach ($items as $item) {
                echo "<div class=\"shopItem\">";
                echo "<img class=\"shopItemImg\" src='${item['eikona']}'/>".
                    "<h2>${item['titlos']} </h2>". 
                    "<p class=\"stock\">STOCK: ${item['apothema']}</p>". 
                    "<p class=\"price\">${item['timi']}</p>";
                echo "</div>";
                }
        ?>            
    </section>
</body>
</html>
