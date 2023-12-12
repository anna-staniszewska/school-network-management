<?php

namespace classes;

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
        //exit();
    }

    public function loginUser()
    {
        if ($this->emptyInput() == false) {
            $error = "wprowadż wszystkie dane";
            header("location: ../index.php?error=emptyinput");
            exit();
        }

        $this->getUser($this->userName, $this->password);

    }

//    public function checkError(){
//        $viewer = new LoginViewer();
//
//        return $viewer->printError();
//    }

    private function emptyInput()
    {
        $result = true;
        if (empty($this->userName) || empty($this->password)) {
            $result = false;
        }
        return $result;
    }
}