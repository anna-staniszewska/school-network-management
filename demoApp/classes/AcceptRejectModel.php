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
}

?>