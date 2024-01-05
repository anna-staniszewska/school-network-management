<?php
session_start();

if(isset($_POST["submit"])) {

    $product = $_POST["product"];

    include "../classes/Database.php";
    include "../classes/InputProductModel.php";
    include "../classes/InputProductController.php";

    $inputProduct = new \classes\inputProductController($product);

    $inputProduct->input();
    header("location: ../subPages/inputProducts.page.php?ok=ok");
}