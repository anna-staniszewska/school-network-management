<?php
//if($_SESSION["Stanowisko"] == "pracownikSekretariatu")    //
//{
    include "../classes/dbh.classes.php";
    include "../classes/entries.php";
    include "../classes/entries-contr.php";
    session_start();
    $entries= new EntriesContr($_SESSION["IdSzkoly"]);

    $entries->getEntries();

    header("location: ../entriesList.php?error=none");
//}