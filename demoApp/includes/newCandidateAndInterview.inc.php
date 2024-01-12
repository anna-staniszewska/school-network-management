<?php
  session_start();
  if(!$_SESSION["Stanowisko"]=="dyrektor") {
    header('location: ../index.php');
  }
  if (isset($_POST["addInterview"])) {
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $birthDate = $_POST["birthDate"];
    $email = $_POST["email"];
    $street = $_POST["street"];
    $building = $_POST["building"];
    $flat = $_POST["flat"];
    $city = $_POST["city"];
    $phoneNumber = $_POST["phoneNumber"];
    $PESEL = $_POST["PESEL"];
    $job = $_POST["job"];
    $interviewDate = $_POST["interviewDate"];
    $interviewStartTime = $_POST["interviewStartTime"];
    $interviewStopTime = $_POST["interviewStopTime"];
    $room = $_POST["room"];
  //$order = $_POST;

  include "../classes/Database.php";
  include "../classes/NewCandidateModel.php";
  include "../classes/NewCandidateController.php";

  $candidate = new NewCandidateController($name,$surname,$birthDate,$email,$street,$building,$flat,$city,$phoneNumber,$PESEL,$job);
  $candidate->inputCandidateTemporary();
  //dwie linijki dla nowego kontrolera, to co wyżej analogicznie

  include "../classes/NewInterviewModel.php";
  include "../classes/NewInterviewController.php";

  $interview = new NewInterviewController($room,$interviewStartTime,$interviewStopTime,$interviewDate);
  $interview->inputInterviewTemporary();

  header("location: schedule.inc.php");

}
