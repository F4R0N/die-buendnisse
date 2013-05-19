<link href="styles/map.css" rel='stylesheet' type='text/css'>
<script src="/js/map.js"></script>
<h3 class="header center">Karte</h3>

<div id="map">
    <?php for ($y = ($_GET["y"] - 5); $y <= ($_GET["y"] + 5); $y++): ?>
        <?php for ($x = ($_GET["x"] - 5); $x <= ($_GET["x"] + 5); $x++): ?>
            <div id='map_field'> x: <?= $x ?> y: <?= $y ?> </div>
        <?php endfor; ?>
    <?php endfor; ?>
</div>