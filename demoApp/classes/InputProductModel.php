<?php

namespace classes;
use Database;
use PDO;
session_start();

class inputProductModel extends Database
{

    protected $error = "";

    protected function inputToDatabase($product){

        $inputDate = date('Y/m/d');
        $id = time();

        $stmt = $this->connect()->prepare('INSERT INTO Zgloszenia VALUES(?, ?, ?, ?, ?)');

        if (!$stmt->execute(array($id, $_SESSION["IdSzkoly"], $product, $inputDate, 0))) {
            $stmt = null;
            header("location: ../subPages/inputProducts.page.php?error=stmtfailed");
            exit();
        }else{
            $_SESSION["feedbackInputProduct"] = "Dziękujemy za zgłoszenie!";
        }
    }
}