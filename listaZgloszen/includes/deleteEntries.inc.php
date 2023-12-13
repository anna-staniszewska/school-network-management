<?php

if(isset($_POST["delete"]))
{
    include "../classes/dbh.classes.php";
    include "../classes/deleteEntries.php";
    include "../classes/deleteEntries-contr.php";

    $delEntries = new DeleteEntriesContr($_POST["products"]);
    $delEntries->deleteEntries();

    header("location: ../includes/entries.inc.php");
}