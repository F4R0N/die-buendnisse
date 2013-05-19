<?php
contain("cfg", "units");

$deff_bonus = $_GET["deff_bonus"];
$off_bonus = $_GET["off_bonus"];
$deff_basic = $_GET["deff_basic"];

if (isset($_GET["ausrechnen"])) {
    // Truppenanzahl der Kontrahenten vor dem Kampf
    $count = array("atk" => array($_GET["off_sta"], $_GET["off_stw"], $_GET["off_spt"], $_GET["off_spw"], $_GET["off_ks"]),
        "deff" => array($_GET["deff_sta"], $_GET["deff_stw"], $_GET["deff_spt"], $_GET["deff_spw"], $_GET["deff_ks"])
    );

    echo "<table border='1'>";
    for ($i = 0; $i < count($units); $i++) {
        echo "<tr>";
        echo "<td>" . $units[$i]->name . ": " . round($count["atk"][$i], 0) . "</td>";
        echo "<td>" . $units[$i]->name . ": " . round($count["deff"][$i], 0) . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    // Initialisierung der Gesamtkraft der Einheiten, erst durch for eingetragen
    $power = array("atk" => 0, "deff" => 0);

    for ($i = 0; $i < count($units); $i++) {
        $power["atk"] += ($units[$i]->atk * $count["atk"][$i]);
        $power["deff"] += ($units[$i]->deff * $count["deff"][$i]);
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

    echo "<table border='1'>";
    for ($i = 0; $i < count($units); $i++) {
        echo "<tr>";
        echo "<td>" . $units[$i]->name . ": " . round($count["atk"][$i], 0) . "</td>";
        echo "<td>" . $units[$i]->name . ": " . round($count["deff"][$i], 0) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>