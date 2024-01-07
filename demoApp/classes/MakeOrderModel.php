<?php

namespace classes;
use Database;
use PDO;
session_start();


class MakeOrderModel extends Database
{

    protected function getUniqueId()
    {
        $id = time();
        return($id);
    }

    private function getCurrentDate()
    {
        $date = date('Y-m-d');
        return $date;
    }

    protected function addOrder($IdZamowienia)
    {
        /**
         * Function adding new order into database
         *
         * "IdZamowienia" is passed to function as result of getUniqueId() function
         *
         * "Data" is set as current date from "getCurrentDate" function
         *
         * "Stan" is set by default as "W trakcie realizacji" (in progress)
         *
         * "Dostarczony" is set by default as "Nie" (No)
         */

            $date = $this->getCurrentDate();


            //######IdSzkoly tymczasowo ustwione na sztywno#####//
            //Column names in table: IdZamowienia, IdSzkoly, Data, Stan, Dostarczony
            $sqlAddOrder = "INSERT INTO Zamowienia VALUES ($IdZamowienia, ?, '$date', 'W trakcie realizacji', NULL, 0)";

            $stmt = $this->connect()->prepare($sqlAddOrder);

            if ($stmt->execute(array($_SESSION["IdSzkoly"]))) {
                return true;
            } else {
                return false;
            }

    }

    protected function addProductsFromForms($IdZamowienia, $order)
    {
        /**
         * Function adds new product, row by row from form filled by secretary into "Produkty" table
         *
         * "IdZamowienia" is passed to function as result of getUniqueId() function
         *
         */

        $nuberOfRows = count($order["Nazwa"]);

        for ($a = 0; $a < $nuberOfRows; $a++) {

            $IdProduktu = $this->getUniqueId();

            sleep( 1 );

            //Column names in table: IdProduktu, IdZamowienia, Nazwa, Ilosc, CenaNetto, CenaBrutto, VAT
            $sqlProduct = "INSERT INTO Produkty VALUES ($IdProduktu, $IdZamowienia, ?
                        , ?, ?, ?, ? )";


            $stmt = $this->connect()->prepare($sqlProduct);

            if($stmt->execute(array($order["Nazwa"][$a], $order["Ilosc"][$a], $order["CenaNetto"][$a], $order["CenaBrutto"][$a], $order["VAT"][$a])) == false){
                return false;
            };

        }

        return true;
        //echo "<p>Pomyslnie dodano produkty</p>";
    }

}