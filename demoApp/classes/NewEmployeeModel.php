<?php

namespace classes;

use Database;

class NewEmployeeModel extends Database{
    protected $error = "";

    protected function inputToDatabase($name, $surname, $position, $dateOfBirth, $email,
                                       $phone, $login, $password,  $pesel, $town, $road, $building, $apartment){

        $stmt = $this->connect()->prepare('SELECT * FROM Pracownicy WHERE Login = ?');

        if (!$stmt->execute(array($login))) {
            $stmt = null;
            header("location: ../subPages/subSubPages/newEmployee.page.php?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() != 0) {
            $stmt = null;
            $_SESSION["feedbackNewEmployee"] = "Ten pracownik już jest zarejestrowany";
            header("location: ../subPages/subSubPages/newEmployee.page.php?error=alreadyexist");
            exit();
        }

        $stmt = null;

        $id = time();
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->connect()->prepare('INSERT INTO Pracownicy VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');

        if (!$stmt->execute(array($id, $_SESSION["IdSzkoly"], $position, $name, $surname, $dateOfBirth, $pesel,
            $phone, $email, $login, $hashed, $town, $road, $building, $apartment))) {
            $stmt = null;
            header("location: ../subPages/subSubPages/newEmployee.page.php?error=stmtfailed");
            exit();
        }else{
            $_SESSION["feedbackNewEmployee"] = "Poprawnie zarejestrowano pracownika";
        }
    }

}