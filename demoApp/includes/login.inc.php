<?php
session_start();

if(isset($_POST["submit"])){

    $userName = $_POST["userName"];
    $password = $_POST["password"];

    include "../classes/Database.php";
    include "../classes/LoginModel.php";
    include "../classes/LoginController.php";

    $login = new \classes\LoginController($userName, $password);

    $login->loginUser();

    if($_SESSION["Stanowisko"] == "dyrektor"){
        header("location: ../includes/schedule.inc.php");

    }elseif($_SESSION["Stanowisko"] == "wlasciciel"){
        header("location: ../subPages/ownerHome.page.php");

    }elseif($_SESSION["Stanowisko"] == "pracownik"){
        header("location: ../subPages/inputProducts.page.php");

    }elseif($_SESSION["Stanowisko"] == "pracownikSekretariatu"){
        header("location: ../subPages/secretariatHome.page.php");

    }elseif($_SESSION["Stanowisko"] == "pracownikDzialuZakupow"){
        header("location: ../includes/orders.inc.php");

    }elseif($_SESSION["Stanowisko"] == "specjalistaDsDostaw"){
        header("location: ../includes/orders.inc.php");

    }elseif($_SESSION["Stanowisko"] == "ksiegowa"){
        header("location: ../subPages/raport.page.php");
    }else{
        header("location: ../index.php?error=brakUprawnien");
    }

}