<?php
    include "../classes/Database.php";
    include "../classes/EntriesModel.php";
    include "../classes/EntriesController.php";
    session_start();
    $entries= new EntriesController($_SESSION["IdSzkoly"]);

    $entries->getEntries();

    header("location: ../subPages/subSubPages/entriesList.page.php?error=none");
