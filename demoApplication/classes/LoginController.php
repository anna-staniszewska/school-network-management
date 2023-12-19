<?php

namespace classes;
session_start();

class LoginController extends LoginModel
{
    private $userName;
    private $password;

    public function __construct($userName, $password)
    {
        $this->userName = $userName;
        $this->password = $password;
//        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
//        header("location: ../index.php?hash=" . $hashedPwd);
//        exit();
    }

    public function loginUser()
    {
        if ($this->emptyInput() == true) {
            $_SESSION["error"] = "Wprowadź wszystkie dane!";
            header("location: ../index.php?error=emptyinput");
            exit();
        }

        $this->getUser($this->userName, $this->password);

    }

    private function emptyInput()
    {
        $result = false;
        if (empty($this->userName) || empty($this->password)) {
            $result = true;
        }
        return $result;
    }
}