<?php
session_start();
class OrdersModel extends Database {

    protected function showOrders($jobPosition, $schoolId){
    //$jobPosition="pracownikSekretariatu";
    //$schoolId="13";


        if($jobPosition=="wlasciciel"){
        $stmtOrders = $this->connect()->prepare(
        "SELECT  
          zamowienia.*, szkola.Nazwa
        FROM 
          zamowienia
        INNER JOIN szkola ON zamowienia.IdSzkoly=szkola.IdSzkoly
        ORDER BY zamowienia.Data, zamowienia.IdSzkoly" 
        );
    
       $stmtProducts = $this->connect()->prepare(
        "SELECT
          produkty.*
        FROM
          produkty
        INNER JOIN zamowienia ON produkty.IdZamowienia=zamowienia.IdZamowienia
        ORDER BY zamowienia.Data, zamowienia.IdSzkoly"
       );
       $stmtOrders->execute();
       $stmtProducts->execute();

      }else if($jobPosition=="pracownikSekretariatu"){
          $stmtOrders = $this->connect()->prepare(
          "SELECT  
            zamowienia.*, szkola.Nazwa
          FROM 
            zamowienia
          INNER JOIN szkola ON zamowienia.IdSzkoly=szkola.IdSzkoly
          WHERE zamowienia.IdSzkoly=?
          ORDER BY zamowienia.Data" 
          );
      
         $stmtProducts = $this->connect()->prepare(
          "SELECT
            produkty.*
          FROM
            produkty
          INNER JOIN zamowienia ON produkty.IdZamowienia=zamowienia.IdZamowienia
          WHERE zamowienia.IdSzkoly=?
          ORDER BY zamowienia.Data"
         );
        $stmtOrders->execute([$schoolId]);
        $stmtProducts->execute([$schoolId]);
      }else if($jobPosition=="pracownikDzialuZakupow" || $jobPosition=="specjalistaDsDostaw"){
        $stmtOrders = $this->connect()->prepare(
        "SELECT  
          zamowienia.*, szkola.Nazwa
        FROM 
          zamowienia
        INNER JOIN szkola ON zamowienia.IdSzkoly=szkola.IdSzkoly
        WHERE zamowienia.IdSzkoly=?
        ORDER BY zamowienia.Data" 
        );
    
       $stmtProducts = $this->connect()->prepare(
        "SELECT
          produkty.*
        FROM
          produkty
        INNER JOIN zamowienia ON produkty.IdZamowienia=zamowienia.IdZamowienia
        WHERE zamowienia.IdSzkoly=?
        ORDER BY zamowienia.Data"
       );
      $stmtOrders->execute([$schoolId]);
      $stmtProducts->execute([$schoolId]);
      
    }
      else{
        //header ktory wywala do logowania
      }
        $rowProducts = $stmtProducts->fetchAll(PDO::FETCH_ASSOC);
        $rowOrders = $stmtOrders->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION["rowProducts"] = $rowProducts;
        $_SESSION["rowOrders"] = $rowOrders;
    }
}

?>