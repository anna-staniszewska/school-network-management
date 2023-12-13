<?php

class OrderListCreator extends Dbh
{
    /**
     *
     * Completed form by the secretary can be validated, and
     * inserted into database by using makeCompleteOrder function
     *
     */

    private function konstruktor()
    {
        /*
         *
         * Dla docelowje wersji systemu usuna ta funkcje
         * i korzystac z dostarzczonych zminnych sesyjnych
         *
         * */
        session_start();

        $_SESSION["IdSzkoly"] = 1;
    }


    private function getMaxIdZamowienia()
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

    private function getMaxIdProduktu()
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

    private function addOrder($maxIdZamowienia)
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
            echo "Pomyslnie dodano zamowienie";
        } else {
            echo "ERROR: Nie udalo sie dodac zamowienia";
        }
    }

    private function addProductsFromForms($maxIdZamowienia, $maxIdProduktu)
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

        $nuberOfRows = count($_POST["Nazwa"]);

        for ($a = 0; $a < $nuberOfRows; $a++) {

            //Column names in table: IdProduktu, IdZamowienia, Nazwa, Ilosc, CenaNetto, CenaBrutto, VAT
            $sqlProduct = "INSERT INTO Produkty VALUES ($maxIdProduktu+1+$a, $maxIdZamowienia+1, ?
                        , ?, ?, ?, ? )";


            $stmt = $this->connect()->prepare($sqlProduct);

            $stmt->execute(array($_POST["Nazwa"][$a], $_POST["Ilosc"][$a], $_POST["CenaNetto"][$a], $_POST["CenaBrutto"][$a], $_POST["VAT"][$a]));


            //$this->connect()->query($sqlProduct);
        }


        echo "<p>Pomyslnie dodano produkty</p>";
    }


    private function validate()
    {
        if (isset($_POST['addOrder'])) {
            if (!isset($_POST['addOrder'])) {
                echo "ERROR: Przycisk potwierdz zamowienie nie dziala prawidlowo";
                return false;
            } else if (!$this->connect()) {
                echo "ERROR: Nie udalo polaczyc sie z baza danych";
                return false;
            } else if (!$_SERVER['REQUEST_METHOD'] == "POST") {
                echo "ERROR: Ustawiono nie prawidlowa metode przesylania danych";
                return false;
            } else if (count($_POST) < 4) {
                echo "ERROR: Tabela z produktami nie zostala wypelniona";
                return false;
            } else if (!isset($_POST['Nazwa'])) {
                echo "ERROR: Nie podano nazwy produktu";
                return false;
            } else {
                return true;
            }
        }
    }

    public function makeCompleteOrder()
    {

        //0. Walidacja danych w tabelce, wyrzucenie ewentualnych bledow DONE
        //1. Znalezienie Max IdZamowienia Dla tablicy zamowien    SELECT IdZamowienia FROM Zamowienia ORDER BY IdZamowienia DESC LIMIT 1;   DONE
        //2. Zanalezienie Max IdProduktu Dla tablicy produkty    SELECT IdProduktu FROM Produkty ORDER BY IdZamowienia DESC LIMIT 1;    DONE
        //3. Zapisanie kazadego wprowadzonego wiersza z tabelki do tabeli produkty, nadajac im to samo IdZamowienia = MAX(Idzamowienia)+1   DONE
        //4. Stworzenie nowego zamowienia w tabeli nadajac mu IdZamowienia=MAX(IdZamowienia), podpiac do nigo wszystkie produkty z tabelki  DONE


        $this->konstruktor();

        //session_start();      //Zienic jak juz bedzie

        if ($this->validate()) {

            $maxIdZamowienia = $this->getMaxIdZamowienia();
            //echo $maxIdZamowienia . '<br>';

            $maxIdProduktu = $this->getMaxIdProduktu();
            //echo $maxIdProduktu . '<br>';

            //dodanie zamowienia
            $this->addOrder($maxIdZamowienia);

            //dodanie wszystkich produktow z formularza
            $this->addProductsFromForms($maxIdZamowienia, $maxIdProduktu);



            header("loctation: AfterOrderCreation.php");

        }
    }
}

?>
