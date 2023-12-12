<?php

namespace classes;

class LoginViewer extends inputProductController {

    public function printError(){
        return $this->error;
    }
}