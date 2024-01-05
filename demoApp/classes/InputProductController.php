<?php

namespace classes;
session_start();

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
            $_SESSION["feedbackInputProduct"] = "Nie wprowadzono nazwy!";
            header("location: ../subPages/inputProducts.page.php?error=emptyinput");
            exit();
        }
        if(strlen($this->product)>50){
            $_SESSION["feedbackInputProduct"] = "Nazwa produktu jest zbyt długa!";
            header("location: ../subPages/inputProducts.page.php?error=toolong");
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