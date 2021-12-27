<?php

namespace App\service2Test;

//service définie dans 

class service2{

    public $param;




    public function __construct($param)
    {
        $this->$param = $param;
    }

    public function age()
    {
        return "Le param est".$this->param;
    }

    /**
     * Get the value of name
     */ 
}

//de la meme maniere on peut relier un service a un service
