<?php
session_start();
class ChangeCommentModel extends Database {

    protected function changeComment($orderId, $comment, $stanowisko){
        if($stanowisko=="pracownikDzialuZakupow"){
            $stmtComment = $this->connect()->prepare(
                "UPDATE  
                  zamowienia
                SET
                    Komentarz=?
                WHERE
                    IdZamowienia=?"
                );
                $stmtComment->execute(array($comment, $orderId));
        }
    }
}

?>