<?php

use models\Player;
use models\PlayerMapper;
use models\Database;

include 'Player.php';
include 'PlayerMapper.php';
include 'Database.php';

try {
    // Criar o banco de dados SQLite
    $connection = Database::getInstance('../players.db');

    // Criar a tabela players se não existir

    // Criar um objeto Player e PlayerMapper
    $newPlayer = new Player('John Doe', 'john_doe', 'john@example.com', 'password123');
    $playerMapper = new PlayerMapper($connection);

    // Testar inserção
    $playerMapper->insert($newPlayer);
    echo "Player inserido com sucesso!\n";

    // Testar atualização
    $newPlayer->setName('John Updated');
    $playerMapper->update($newPlayer);
    echo "Player atualizado com sucesso!\n";

    // Testar obtenção por ID
    $playerId = $newPlayer->getId();
    $retrievedPlayer = $playerMapper->getById($playerId);
    echo "Player obtido por ID:\n";
    print_r($retrievedPlayer);

    // Testar obtenção de todos os jogadores
    $allPlayers = $playerMapper->getAll();
    echo "Todos os jogadores:\n";
    print_r($allPlayers);

    // Testar exclusão
    $playerMapper->delete($newPlayer);
    echo "Player excluído com sucesso!\n";

} catch (\Exception $e) {
    echo "Erro: " . $e->getMessage() . "\n";
}
