<?php
//if($_SESSION["Stanowisko"] == "pracownikSekretariatu")    //
//{
    include "../classes/Database.php";
    include "../classes/Entries.php";
    include "../classes/EntriesController.php";
    session_start();
    $entries= new EntriesController($_SESSION["IdSzkoly"]);

    $entries->getEntries();

    header("location: ../subPages/subSubPages/entriesList.php?error=none");
//}