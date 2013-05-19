<link href="styles/map.css" rel='stylesheet' type='text/css'>
<h3 class="header center">Karte</h3>

@TODO{
    Aktuelle Adresse auf jeder Seite verfügbar, um Inhalt anzuhängen!!!! (DS-Like)
}

<div id="map">
    <div class="map_move" id="map_move_up">
        <a href="&x=<?= $data["pos"]["x"] ?>&y=<?= $data["pos"]["y"] + 10 ?>">Oben</a>
    </div>
    <div class="map_move" id="map_move_right">
        <a href="&x=<?= $data["pos"]["x"] + 10 ?>&y=<?= $data["pos"]["y"] ?>">Rechts</a>
    </div>
    <div class="map_move" id="map_move_down">
        <a href="&x=<?= $data["pos"]["x"] ?>&y=<?= $data["pos"]["y"] - 10 ?>">Unten</a>
    </div>
    <div class="map_move" id="map_move_left">
        <a href="&x=<?= $data["pos"]["x"] - 10 ?>&y=<?= $data["pos"]["y"] ?>">Links</a>
    </div>

    <?php for ($y = ($_GET["y"] + 5); $y >= ($_GET["y"] - 5); $y--): ?>
        <?php for ($x = ($_GET["x"] + 5); $x >= ($_GET["x"] - 5); $x--): ?>
            <div id='map_field'> x: <?= $x ?> y: <?= $y ?> </div>
        <?php endfor; ?>
    <?php endfor; ?>
</div>