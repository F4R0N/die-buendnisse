<?php
    session_start();

    $player = new player($_SESSION['ID']);

    $data['player'] = $player;

    contain("tpl", 'overview');
