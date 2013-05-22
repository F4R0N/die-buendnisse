<link href="styles/map.css" rel='stylesheet' type='text/css'>
<script src="/js/map.js"></script>
<h3 class="header center">Karte</h3>

<div id="map">
    <div class="map_move" id="map_move_up">
        <a href="?page=map&x=<?= $data["pos"]["x"] ?>&y=<?= $data["pos"]["y"] + 1 ?>">Oben</a>
    </div>
    <div class="map_move" id="map_move_down">
        <a href="?page=map&x=<?= $data["pos"]["x"] ?>&y=<?= $data["pos"]["y"] - 1 ?>">Unten</a>
    </div>
    <div class="map_move" id="map_move_left">
        <a href="?page=map&x=<?= $data["pos"]["x"] - 1 ?>&y=<?= $data["pos"]["y"] ?>">Links</a>
    </div>
    <div class="map_move" id="map_move_right">
        <a href="?page=map&x=<?= $data["pos"]["x"] + 1 ?>&y=<?= $data["pos"]["y"] ?>">Rechts</a>
    </div>

    <?php for ($y = ($data["pos"]["y"] + $data["map"]["size"]); $y >= ($data["pos"]["y"] - $data["map"]["size"]); $y--): ?>
        <div class="row" style="clear: left;">
            <?php for ($x = ($data["pos"]["x"] - $data["map"]["size"]); $x <= ($data["pos"]["x"] + $data["map"]["size"]); $x++): ?>
                <div id='map_field' data-x="<?= $x ?>" data-y="<?= $y ?>">
                    <?php if (isset($data["map"]["fields"][$x][$y]['image'])): ?>
                        <img src="<?= $data["map"]["fields"][$x][$y]['image'] ?>"/>
                        <div class="map_info_hide">x: <?= $x ?> y: <?= $y ?> <hr>FeldID: <?= $data["map"]["fields"][$x][$y]['ID'] ?> UserID: <?= $data["map"]["fields"][$x][$y]['UserID'] ?></div>
                    <?php else: ?>
                        <img src="/images/map/Gras.png" />
                    <?php endif; ?>
                </div>
            <?php endfor; ?>
        </div>
    <?php endfor; ?>
</div>
<div style="clear: left;"></div>