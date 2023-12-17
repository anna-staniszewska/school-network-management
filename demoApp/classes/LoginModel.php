<?php

namespace classes;
use Database;
use PDO;
session_start();

class LoginModel extends Database{

    protected function getUser($userName, $password)
    {
        $stmt = $this->connect()->prepare('SELECT HasloHash FROM Pracownicy WHERE Login = ?');

        if (!$stmt->execute(array($userName))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            $_SESSION["error"] = "Nie znaleziono użytkownika!";
            header("location: ../index.php?error=usernotfound");
            exit();
        }

        $passwordHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPassword = password_verify($password, $passwordHashed[0]["HasloHash"]);
        $stmt = null;

        if ($checkPassword == false) {
            $_SESSION["error"] = "Złe hasło!";
            header("location: ../index.php?error=wrongpassword");
            exit();
        } elseif ($checkPassword == true) {
            //lub * w SELECT
            $stmt = $this->connect()->prepare('SELECT Stanowisko, IdPracownika, IdSzkoly, Imie FROM Pracownicy WHERE Login = ?');

            //comment next two if
            if (!$stmt->execute(array($userName))) {
                $stmt = null;
                header("location: ../index.php?error=stardfailed");
                exit();
            }

            if ($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: ../index.php?error=usernotfound");
                exit();
            }
            //

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            //$_SESSION = $user;
            $_SESSION["Stanowisko"] = $user[0]["Stanowisko"];
            $_SESSION["IdPracownika"] = $user[0]["IdPracownika"];
            $_SESSION["IdSzkoly"] = $user[0]["IdSzkoly"];
            $_SESSION["Imie"] = $user[0]["Imie"];
        }
    }
}