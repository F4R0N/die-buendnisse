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

$units = array(
    new unit("Steinaxtkampf", 10, 5, 10), // Off
    new unit("Steinewerfer", 10, 10, 8), // Ausgeglichen
    new unit("Speertrager", 5, 15, 10), // Deff
    new unit("Speerwerfer", 5, 10, 8), // Deff
    new unit("Keulenschwinger", 20, 15, 12)  // Off
);
?>