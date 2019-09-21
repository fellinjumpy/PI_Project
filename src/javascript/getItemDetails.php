<?php 
    include("../helpers/shopDb.php");
    $data = new Items();
    $data->connect();
    echo $data->getItemDetails($_POST['id']);

?>