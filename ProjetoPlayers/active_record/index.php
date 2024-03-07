<?php

use \models\Database;
use \models\Player;

include 'models/Database.php';
include 'models/Player.php';

$db = Database::getInstance('players.db');

$template = file_get_contents('views/index.html');
$template_linha = file_get_contents('views/templateLine.html');


$players = Player::getAll();

$lines = '';

foreach ($players as $player) {
    $line = $template_linha;

    $line = str_replace('{id}', $player['id'], $line);
    $line = str_replace('{name}', $player['name'], $line);
    $line = str_replace('{username}', $player['username'], $line);
    $line = str_replace('{email}', $player['email'], $line);
    $line = str_replace('{registration_date}', $player['registration_date'], $line);

    $lines .= $line;
}

$template = str_replace("{LINES}", $lines, $template);

echo $template;
