<?php

use models\Database;
use models\Player;
use models\PlayerMapper;

include 'models/Database.php';
include 'models/Player.php';
include 'models/PlayerMapper.php';

$db = Database::getInstance('players.db');

$default_player = new Player('default', 'default', 'default', 'default');
$playerMapper = new PlayerMapper($db);

$template = file_get_contents('views/index.html');
$template_linha = file_get_contents('views/templateLine.html');

$players = $playerMapper->getAll(); // Substitua getAll() pelo método apropriado, por exemplo, fetchAll().

$lines = '';

foreach ($players as $player) {
    $line = $template_linha;

    $line = str_replace('{id}', $player->getId(), $line);
    $line = str_replace('{name}', $player->getName(), $line);
    $line = str_replace('{username}', $player->getUsername(), $line);
    $line = str_replace('{email}', $player->getEmail(), $line);
    $line = str_replace('{registration_date}', $player->getRegistrationDate(), $line);

    $lines .= $line;
}

$template = str_replace("{LINES}", $lines, $template);

echo $template;
