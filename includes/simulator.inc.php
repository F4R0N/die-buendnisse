<?php

contain("cfg", "units");

$units['stone'] = array(
    new unit("Steinaxtkampf", 10, 5, 10), // Off
    new unit("Steinewerfer", 10, 10, 8), // Ausgeglichen
    new unit("Speertrager", 5, 15, 10), // Deff
    new unit("Speerwerfer", 5, 10, 8), // Deff
    new unit("Keulenschwinger", 20, 15, 12)  // Off
);


$units['bronce'] = array(
    new unit("Braxtkampf", 10, 5, 10), // Off
    new unit("Steinewerfer", 10, 10, 8), // Ausgeglichen
    new unit("Speertrager", 5, 15, 10), // Deff
    new unit("Speerwerfer", 5, 10, 8), // Deff
    new unit("Keulenschwinger", 20, 15, 12)  // Off
);


$deff_bonus = 1;
$off_bonus = 1;
$deff_basic = 50;

if (isset($_POST["ausrechnen"])) {

    // Truppenanzahl der Kontrahenten vor dem Kampf
    $count = array("atk" => array($_POST["off_sta"], $_POST["off_stw"], $_POST["off_spt"], $_POST["off_spw"], $_POST["off_ks"]),
        "deff" => array($_POST["deff_sta"], $_POST["deff_stw"], $_POST["deff_spt"], $_POST["deff_spw"], $_POST["deff_ks"])
    );

    $epoch = "stone";
    echo "<h2>Auf in den Kampf!!!</h2>";
    echo "<table border='1'>";
    echo "<tr>";
        echo "<td>Off</td>";
        echo "<td>Deff</td>";
    echo "</tr>";
    for ($i = 0; $i < count($units[$epoch]); $i++) {
        echo "<tr>";
            echo "<td>" . $units[$epoch][$i]->name . ": " . round($count["atk"][$i], 0) . "</td>";
            echo "<td>" . $units[$epoch][$i]->name . ": " . round($count["deff"][$i], 0) . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    // Initialisierung der Gesamtkraft der Einheiten, erst durch for eingetragen
    $power = array("atk" => 0, "deff" => 0);

    for ($i = 0; $i < count($units[$epoch]); $i++) {
        $power["atk"] += ($units[$epoch][$i]->atk * $count["atk"][$i]);
        $power["deff"] += ($units[$epoch][$i]->deff * $count["deff"][$i]);
    }
    $power["atk"] *= $off_bonus;
    $power["deff"] *= $deff_bonus;
    $power["deff"] += $deff_basic;


    // Initialisierung der Truppenanzahl
    $truppen = array(
        "atk" => array_sum($count["atk"]),
        "deff" => array_sum($count["deff"])
    );
    $differenz = $power["atk"] - $power["deff"];

    $ges_power = array("atk" => array(), "deff" => array());

    foreach ($units as $unit) {
        $ges_power["atk"][] = $unit->atk;
        $ges_power["deff"][] = $unit->deff;
    }

    $max_atk = max($ges_power["atk"]);
    $max_deff = max($ges_power["deff"]);

    if ($differenz > 0) {
        echo "<p>Offer hat gewonnen. <p />";

        $quotient = ($differenz / $power["atk"]);

        for ($i = 0; $i < count($count["atk"]); $i++) {
            $count["atk"][$i] *= $quotient;
        }

        $count["deff"] = 0;
    } else if ($differenz < 0) {
        echo "<p>Deffer hat gewonnen. <p />";

        $quotient = ($differenz * (-1)) / $power["deff"];
        

        for ($i = 0; $i < count($count["deff"]); $i++) {
            $count["deff"][$i] *= $quotient;
        }
        $count["atk"] = 0;
    } else if ($differenz == 0) {
        echo "<p>Unentschieden!!</p>";
        $count["atk"] = 0;
        $count["deff"] = 0;
    }
    echo "<h2>Die, die aufr&auml;umen m&uuml;ssen...</h2>";
    echo "<table border='1'>";
    echo "<tr>";
        echo "<td>Off</td>";
        echo "<td>Deff</td>";
    echo "</tr>";
    for ($i = 0; $i < count($units[$epoch]); $i++) {
        echo "<tr>";
            echo "<td>" . $units[$epoch][$i]->name . ": " . round($count["atk"][$i], 0) . "</td>";
            echo "<td>" . $units[$epoch][$i]->name . ": " . round($count["deff"][$i], 0) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}
    ?>
<hr>

    <h2>PROTOKAN</h2>

<style>    
    form input { 
        display: block; 
        background-color: black;
        color: greenyellow;
    }
    
</style>

<form method="POST" action="game.php?page=simulator">
    Off:
    <input type="text" name="off_sta" placeholder="Steinaxtkampf OFF" />
    <input type="text" name="off_stw" placeholder="Steinewerfer AUS" />
    <input type="text" name="off_spt" placeholder="Speertrager DEFF" />
    <input type="text" name="off_spw" placeholder="Speerwerfer DEFF" />
    <input type="text" name="off_ks" placeholder="Keulenschwinger OFF" />

    Deff:
    <input type="text" name="deff_sta" placeholder="Steinaxtkampf" />
    <input type="text" name="deff_stw" placeholder="Steinewerfer" />
    <input type="text" name="deff_spt" placeholder="Speertrager" />
    <input type="text" name="deff_spw" placeholder="Speerwerfer" />
    <input type="text" name="deff_ks" placeholder="Keulenschwinger" />
   
    <button type="submit" name="ausrechnen" value="True">Berechnen</button>
</form>
