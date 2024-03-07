<?php

use models\Database;
use models\Player;
use models\PlayerMapper;

include '../models/Database.php';
include '../models/Player.php';
include '../models/PlayerMapper.php';

$db = Database::getInstance('../players.db');

$playerId = $_GET['id'];
$action   = $_GET['action'];

if($action ==='delete') {
    $playerToDelete = new Player('delete', 'delete', 'delete@example.com', 'delete');
    $playerMapper = new PlayerMapper($db);
    $playerToDelete->setId($playerId);
    $playerMapper->delete($playerToDelete);

}else if($action === 'cancel') {}

header('Location: ../index.php');
exit();