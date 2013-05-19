<link href="styles/map.css" rel='stylesheet' type='text/css'>
<script src="/js/map.js"></script>
<h3 class="header center">Karte</h3>

<div id="map">
    <div class="map_move" id="map_move_up">
        <a href="?page=map&x=<?= $data["pos"]["x"] ?>&y=<?= $data["pos"]["y"] + 10 ?>">Oben</a>
    </div>
    <div class="map_move" id="map_move_right">
        <a href="?page=map&x=<?= $data["pos"]["x"] + 10 ?>&y=<?= $data["pos"]["y"] ?>">Rechts</a>
    </div>
    <div class="map_move" id="map_move_down">
        <a href="?page=map&x=<?= $data["pos"]["x"] ?>&y=<?= $data["pos"]["y"] - 10 ?>">Unten</a>
    </div>
    <div class="map_move" id="map_move_left">
        <a href="?page=map&x=<?= $data["pos"]["x"] - 10 ?>&y=<?= $data["pos"]["y"] ?>">Links</a>
    </div>

    <?php for ($y = ($_GET["y"] + 5); $y >= ($_GET["y"] - 5); $y--): ?>
        <?php for ($x = ($_GET["x"] + 5); $x >= ($_GET["x"] - 5); $x--): ?>
            <div id='map_field' data-x="<?= $x ?>" data-y="<?= $y ?>">
                <div class="map_info_hide">x: <?= $x ?> y: <?= $y ?></div>
            </div>
        <?php endfor; ?>
    <?php endfor; ?>
</div>