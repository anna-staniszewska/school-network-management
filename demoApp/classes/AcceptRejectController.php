<?php

class AcceptRejectController extends AcceptRejectModel {
    private $orderId;
    private $action;
    private $delivered;
    public function __construct($orderId, $action, $delivery) {
        $this->orderId = $orderId;
        $this->action= $action;
        $this->delivered = $delivery;
    }
    public function getStatus() {
        $this->changeStatus($this->orderId, $this->action);
    }

    public function changDeliveryStatus(){
        $this->delivery($this->delivered);
    }
}

?>