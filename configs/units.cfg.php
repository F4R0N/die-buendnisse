<?php

contain("class", "units");

$units['stone'] = array(
    new unit("Steinaxtkampf", 10, 5, 10), // Off
    new unit("Steinewerfer", 10, 10, 8), // Ausgeglichen
    new unit("Speertrager", 5, 15, 10), // Deff
    new unit("Speerwerfer", 5, 10, 8), // Deff
    new unit("Keulenschwinger", 20, 15, 12)  // Off
);

$units['bronce'] = array(
    new unit("Braxtkampf", 10, 5, 10), // Off
    new unit("Bronzeewerfer", 10, 10, 8), // Ausgeglichen
    new unit("Speertrager", 5, 15, 10), // Deff
    new unit("Speerwerfer", 5, 10, 8), // Deff
    new unit("Keulenschwinger", 20, 15, 12)  // Off
);
?>
