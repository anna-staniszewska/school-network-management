<?php

namespace classes;

class inputProductController extends inputProductModel
{

    private $product;

    public function __construct($product)
    {
        $this->product = $product;
    }

    public function input()
    {
        if ($this->emptyInput() == false) {
            $error = "wprowadż wszystkie dane";
            header("location: ../subPages/zgloszeniaProduktow.php?error=emptyinput");
            exit();
        }
        if(strlen($this->product)>50){
            header("location: ../subPages/zgloszeniaProduktow.php?error=toolong");
            exit();
        }

        $this->inputToDatabase($this->product);

    }

    private function emptyInput()
    {
        $result = true;
        if (empty($this->product)) {
            $result = false;
        }
        return $result;
    }
}