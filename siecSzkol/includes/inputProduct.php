<?php

if(isset($_POST["submit"])) {

    $product = $_POST["product"];

    include "../classes/Database.php";
    include "../classes/inputProductModel.php";
    include "../classes/inputProductController.php";

    $inputProduct = new \classes\inputProductController($product);

    $inputProduct->input();
    header("location: ../subPages/zgloszeniaProduktow.php?ok=ok");
}