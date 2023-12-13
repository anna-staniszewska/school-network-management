<?php

if(isset($_POST["delete"]))
{
    include "../classes/Database.php";
    include "../classes/DeleteEntries.php";
    include "../classes/DeleteEntriesController.php";

    $delEntries = new DeleteEntriesController($_POST["products"]);
    $delEntries->deleteEntries();

    header("location: ../includes/Entries.php");
}