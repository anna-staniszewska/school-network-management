<?php

class ChangeCommentController extends ChangeCommentModel {
    private $orderId;
    private $komentarz;
    private $stanowisko;
    public function __construct($orderId, $komentarz, $stanowisko) {
        $this->orderId = $orderId;
        $this->komentarz=$komentarz;
        $this->stanowisko=$stanowisko;
    }
    public function getComment() {
        $this->changeComment($this->orderId, $this->komentarz, $this->stanowisko);
    }
}

?>