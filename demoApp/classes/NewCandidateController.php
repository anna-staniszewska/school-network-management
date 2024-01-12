<?php

class NewCandidateController extends NewCandidateModel {
    private $name;
    private $surname;
    private $birthDate;
    private $email;
    private $street;
    private $building;
    private $flat;
    private $city;
    private $phoneNumber;
    private $PESEL;
    private $job;

    public function __construct($name,$surname,$birthDate,$email,$street,$building,$flat,$city,$phoneNumber,$PESEL,$job) {

        $this->name = $name;
        $this->surname = $surname;
        $this->birthDate = $birthDate;
        $this->email = $email;
        $this->street = $street;
        $this->building = $building;
        $this->flat = $flat;
        $this->city = $city;
        $this->phoneNumber = $phoneNumber;
        $this->PESEL = $PESEL;
        $this->job = $job;
    }

    public function inputCandidateTemporary() {
        if($this->emptyInput()==false) {
            //echo "Empty input!";
            header("location: ../subPages/subSubPages/inputNewInterview.page.php?error=emptyGetInput");
            exit();
        }
        $this->inputCandidate($this->name,$this->surname,$this->birthDate,$this->email,$this->street,$this->building,$this->flat,$this->city,$this->phoneNumber,$this->PESEL,$this->job);
    }

    public function emptyInput() {
        if(empty($this->name)) {
            $result = false;
        }
        else if(empty($this->surname)) {
            $result = false;
        }
        else if(empty($this->birthDate)) {
            $result = false;
        }
        else if(empty($this->email)) {
            $result = false;
        }
        else if(empty($this->street)) {
            $result = false;
        }
        else if(empty($this->building)) {
            $result = false;
        }
        else if(empty($this->flat)) {
            $result = false;
        }
        else if(empty($this->city)) {
            $result = false;
        }
        else if(empty($this->phoneNumber)) {
            $result = false;
        }
        else if(empty($this->PESEL)) {
            $result = false;
        }
        else if(empty($this->job)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }
}
