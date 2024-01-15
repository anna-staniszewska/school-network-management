<?php
session_start();
class AcceptRejectModel extends Database {

    protected function changeStatus($orderId, $action){

        if($action=="accept"){
            $stmtStatus = $this->connect()->prepare(
                "UPDATE  
          zamowienia
        SET
            Stan='Zaakceptowano'
        WHERE
            IdZamowienia=?"
            );
            $stmtStatus->execute([$orderId]);
        }else if($action=="reject"){
            $stmtStatus = $this->connect()->prepare(
                "UPDATE  
              zamowienia
            SET
                Stan='Odrzucono'
            WHERE
                IdZamowienia=?"
            );
            $stmtStatus->execute([$orderId]);
        }
    }

    protected function delivery($orderId){
        $prestmt = $this->connect()->prepare(
            'SELECT Dostarczony FROM zamowienia WHERE IdZamowienia=?');

        if (!$prestmt->execute(array($orderId))) {
            $prestmt = null;
            header("location: ../subPages/subSubPages/ordersList.page.php?error=stmtfailed");
            exit();
        }

        $state = $prestmt->fetchAll(PDO::FETCH_ASSOC);

        if($state[0]["Dostarczony"] == 'Nie') {
            $stmt = $this->connect()->prepare(
                "UPDATE  
              zamowienia
            SET
                Dostarczony='Tak'
            WHERE
                IdZamowienia=?");
            $_SESSION["buttonColor"] = "green";
        }
        else{
            $stmt = $this->connect()->prepare(
                "UPDATE  
              zamowienia
            SET
                Dostarczony='Nie'
            WHERE
                IdZamowienia=?");
            $_SESSION["buttonColor"] = "red";
        }

        if (!$stmt->execute(array($orderId))) {
            $stmt = null;
            header("location: ../subPages/subSubPages/ordersList.page.php?error=stmtfailed");
            exit();
        }
    }

}

?>