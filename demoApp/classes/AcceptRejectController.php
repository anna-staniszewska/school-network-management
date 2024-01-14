<?php

class AcceptRejectController extends AcceptRejectModel {
    private $orderId;
    private $action;
    public function __construct($orderId, $action) {
        $this->orderId = $orderId;
        $this->action= $action;
    }
    public function getStatus() {
        $this->changeStatus($this->orderId, $this->action);
    }
}

?>