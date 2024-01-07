<?php

namespace classes;

class MakeOrderController extends MakeOrderModel
{
    private $order;
    private $error;

    public function __construct($order)
    {
        $this->order = $order;
    }

    private function validate()
    {
        if (!isset($_POST['addOrder'])) {
            $this->error = "ERROR=Przycisk_potwierdz_zamowienie_nie_dziala_prawidlowo";
            return false;
        } else if (!$this->connect()) {
            $this->error = "ERROR=Nie_dalo_polaczyc_sie_z_baza_danych";
            return false;
        } else if (!$_SERVER['REQUEST_METHOD'] == "POST") {
            $this->error = "ERROR=Ustawiono_nie_prawidlowa_metode_przesylania_danych";
            return false;
        } else if (count($_POST) < 4) {
            $this->error = "ERROR=Tabela_z_produktami_nie_zostala_wypelniona";
            return false;
        } else if (!isset($_POST['Nazwa'])) {
            $this->error = "ERROR=Nie_podano_nazwy_produktu";
            return false;
        } else {
            return true;
        }
    }

    public function printError()
    {
        if (strlen($this->error) == 0) {
            return "Nieznay_blad";
        } else {
            return $this->error;
        }
    }

    public function makeCompleteOrder()
    {

        try {
            if ($this->validate()) {

                $idZamowienia = $this->getUniqueId();


                //dodanie zamowienia
                if ($this->addOrder($idZamowienia) == false) {
                    return false;
                }

                //dodanie wszystkich produktow z formularza
                if ($this->addProductsFromForms($idZamowienia, $_POST) == false) {
                    return false;
                }

                return true;

            }
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
    }

}