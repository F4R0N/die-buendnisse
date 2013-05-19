<?php

class unit {

    public $name;
    public $atk;
    public $deff;
    public $geschw;

    public function __construct($name, $atk, $deff, $geschw) {
        $this->name = $name;
        $this->atk = $atk;
        $this->deff = $deff;
        $this->geschw = $geschw;
    }

}

?>