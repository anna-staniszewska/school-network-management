<?php

if(isset($_POST["submit"])){

    $userName = $_POST["userName"];
    $password = $_POST["password"];

    include "../classes/Database.php";
    include "../classes/LoginModel.php";
    include "../classes/LoginController.php";

    $login = new \classes\LoginController($userName, $password);

    $login->loginUser();
    //$viewError = $login->checkError();

    //do testów wraca na główną
    //header("location: ../index.php?=ok");

    //jak poprawdnie do docelowo przechodzi

    if($_SESSION["Stanowisko"] == "dyrektor"){
        header("location: ../subPages/rekrutacja.php");
    }elseif($_SESSION["Stanowisko"] == "wlasciciel"){
        header("location: ../subPages/homeWlasciciel.php");
    }elseif($_SESSION["Stanowisko"] == "pracownik"){
        header("location: ../subPages/zgloszeniaProduktow.php");
    }elseif($_SESSION["Stanowisko"] == "pracownikSekretariatu"){
        header("location: ../subPages/homeSekretariatu.php");
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