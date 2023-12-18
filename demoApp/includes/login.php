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
        header("location: ../subPages/rekrutacja.php");

    }elseif($_SESSION["Stanowisko"] == "wlasciciel"){
        header("location: ../subPages/ownerHome.php");

    }elseif($_SESSION["Stanowisko"] == "pracownik"){
        header("location: ../subPages/inputProducts.php");

    }elseif($_SESSION["Stanowisko"] == "pracownikSekretariatu"){
        header("location: ../subPages/secretariatHome.php");

    }elseif($_SESSION["Stanowisko"] == "pracownikDzialuZakupow"){
        header("location: ../subPages/potwierdzanieZamowien.php");

    }elseif($_SESSION["Stanowisko"] == "specjalistaDsDostaw"){
        header("location: ../subPages/sprawdzanieDostaw.php");

    }elseif($_SESSION["Stanowisko"] == "ksiegowa"){
        header("location: ../subPages/raport.php");
    }else{
        header("location: ../index.php?error=brakUprawnien");
    }

}