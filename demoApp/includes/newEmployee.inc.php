<?php
session_start();

if(isset($_POST["submit"])) {

    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $position = $_POST["position"];
    $dateOfBirth = $_POST["dateOfBirth"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $login = $_POST["login"];
    $password = $_POST["password"];
    $passwordCheck = $_POST["passwordCheck"];
    $pesel = $_POST["pesel"];
    $town = $_POST["town"];
    $road = $_POST["road"];
    $building = $_POST["building"];
    $apartment = $_POST["apartment"];

    include "../classes/Database.php";
    include "../classes/NewEmployeeModel.php";
    include "../classes/NewEmployeeController.php";

    $employee = new \classes\NewEmployeeController($name, $surname, $position, $dateOfBirth, $email, $phone,
        $login, $password, $passwordCheck, $pesel, $town, $road, $building, $apartment);

    $employee->newEmployee();
    header("location: ../subPages/subSubPages/newEmployee.page.php?ok=ok");
}