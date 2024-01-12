<?php
  session_start();
  if($_SESSION["Stanowisko"]!="dyrektor") {
    header('location: ../index.php');
  }
//if (isset($_POST["addInterview"])) {

  //$order = $_POST;

  include "../classes/Database.php";
  include "../classes/InputNewInterviewModel.php";
  include "../classes/InputNewInterviewController.php";

  $interview = new InputNewInterviewController($_SESSION["IdSzkoly"]);
  $interview->getRoomsTemporary();
  header("location: ../subPages/subSubPages/inputNewInterview.page.php?error=none");
