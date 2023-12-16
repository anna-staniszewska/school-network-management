<?php

namespace classes;
use Database;
use PDO;
session_start();


class MakeOrderModel extends Database
{

    protected function getMaxIdZamowienia()
    {
        /**
         * Return's maximum order id from Products table
         */
        $sqlMaxIdZamowienia = "SELECT IdZamowienia FROM Zamowienia ORDER BY IdZamowienia DESC LIMIT 1";


        // there's only one row in results
        $resultsMaxIdZamowienia = $this->connect()->query($sqlMaxIdZamowienia);


        while ($IdZamowienia = $resultsMaxIdZamowienia->fetch(PDO::FETCH_ASSOC)) {
            $maxIdZamowienia = $IdZamowienia['IdZamowienia'];
        }

        return $maxIdZamowienia;
    }

    protected function getMaxIdProduktu()
    {
        /**
         * Return's maximum product id from Products table
         */

        $sqlMaxIdProduktu = "SELECT IdProduktu FROM Produkty ORDER BY IdZamowienia DESC LIMIT 1";

        //there's only one row in results
        $resultsMaxIdProduktu = $this->connect()->query($sqlMaxIdProduktu);

        while ($IdProduktu = $resultsMaxIdProduktu->fetch(PDO::FETCH_ASSOC)) {
            $maxIdProduktu = $IdProduktu['IdProduktu'];
        }


        return $maxIdProduktu;
    }

    private function getCurrentDate()
    {
        $date = date('Y-m-d');
        return $date;
    }

    protected function addOrder($maxIdZamowienia)
    {
        /**
         * Function adding new order into database
         *
         * "IdZamowienia" is passed to function as MAX(IdZamowienia") in "Zamowienia" table before data insertion
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
        $sqlAddOrder = "INSERT INTO Zamowienia VALUES ($maxIdZamowienia+1, ?, '$date', 'W trakcie realizacji', 'Nie')";

        $stmt = $this->connect()->prepare($sqlAddOrder);

        if ($stmt->execute(array($_SESSION["IdSzkoly"]))) {
            return true;
        } else {
            return false;
        }
    }

    protected function addProductsFromForms($maxIdZamowienia, $maxIdProduktu, $order)
    {
        /**
         * Function adds new product, row by row from form filled by secretary into "Produkty" table
         *
         * "IdZamowienia" is passed to function as MAX("IdZamowienia") in "Zamowienia" table before data insertion
         *
         * "IdProduktu" is passed to function as MAX("IdProduktu") in "Produkty" table before data insertion
         *
         *
         */

        $nuberOfRows = count($order["Nazwa"]);

        for ($a = 0; $a < $nuberOfRows; $a++) {

            //Column names in table: IdProduktu, IdZamowienia, Nazwa, Ilosc, CenaNetto, CenaBrutto, VAT
            $sqlProduct = "INSERT INTO Produkty VALUES ($maxIdProduktu+1+$a, $maxIdZamowienia+1, ?
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