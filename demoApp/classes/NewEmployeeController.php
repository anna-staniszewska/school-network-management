<?php
namespace classes;
session_start();

class NewEmployeeController extends NewEmployeeModel{
    private $name;
    private $surname;
    private $position;
    private $dateOfBirth;
    private $email;
    private $phone;
    private $login;
    private $password;
    private $passwordCheck;
    private $pesel;
    private $town;
    private $road;
    private $building;
    private $apartment;

    /**
     * @param $name
     * @param $surname
     * @param $position
     * @param $dateOfBirth
     * @param $email
     * @param $phone
     * @param $login
     * @param $password
     */
    public function __construct($name, $surname, $position, $dateOfBirth, $email, $phone,
                                $login, $password, $passwordCheck, $pesel, $town, $road, $building, $apartment)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->position = $position;
        $this->dateOfBirth = $dateOfBirth;
        $this->email = $email;
        $this->phone = $phone;
        $this->login = $login;
        $this->password = $password;
        $this->passwordCheck = $passwordCheck;
        $this->pesel = $pesel;
        $this->town = $town;
        $this->road = $road;
        $this->building = $building;
        $this->apartment = $apartment;
    }


    public function newEmployee()
    {
        if ($this->emptyInput() == false) {
            $_SESSION["feedbackNewEmployee"] = "Nie wprowadzono wszystkich danych!";
           header("location: ../subPages/subSubPages/newEmployee.page.php?error=emptyinput");
           exit();
        }

        if($this->password != $this->passwordCheck){
            $_SESSION["feedbackNewEmployee"] = "Powtórz hasło";
            header("location: ../subPages/subSubPages/newEmployee.page.php?error=invalidpassword");
            exit();
        }
        $this->inputToDatabase($this->name, $this->surname, $this->position, $this->dateOfBirth, $this->email, $this->phone,
            $this->login, $this->password,  $this->pesel, $this->town, $this->road, $this->building, $this->apartment);

    }

    private function emptyInput()
    {
        $result = true;
        if (empty($this->name) || empty($this->surname) || empty($this->position) || empty($this->dateOfBirth) ||
            empty($this->email) || empty($this->phone) || empty($this->login) || empty($this->password) ||
            empty($this->pesel) || empty($this->town) || empty($this->road) || empty($this->building)) {

            $result = false;
        }
        return $result;
    }

}