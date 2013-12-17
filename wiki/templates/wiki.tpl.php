<html>
    <head>
        <? if (isset($topic)): ?>
            <title><?= $topic; ?></title>
        <? else: ?>
            <title>Wiki</title>
        <? endif; ?>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <script src="js/wiki.js"></script>
    </head>
    <body>
        <header>
            <?php include "header.tpl.php" ?>
        </header>
        <div id="content">
            <h2 align="center">Wiki</h2>
            <?= $html; ?>
        </div>
            <?php include "templates/add.tpl.php"; ?>
    </body>
</html>
