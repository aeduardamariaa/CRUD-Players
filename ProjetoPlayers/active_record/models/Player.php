<?php

namespace models;

use Exception;

class Player
{
    private $id;
    private $name;
    private $username;
    private $email;
    private $password;
    private $registration_date;

    public function __construct($name, $username, $email, $password)
    {
        $this->name = $name;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->registration_date = date('Y-m-d H:i:s');
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId(){
        return $this->id;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }
    public function save()
    {
        try {
            $db = Database::getInstance('players.db');
            $stmt = $db->prepare("INSERT INTO players (id, name, username, email, password, registration_date) 
                                VALUES (:id, :name, :username, :email, :password, :registration_date)");

            $stmt->bindParam(':id', $this->id, \PDO::PARAM_STR);
            $stmt->bindParam(':name', $this->name, \PDO::PARAM_STR);
            $stmt->bindParam(':username', $this->username, \PDO::PARAM_STR);
            $stmt->bindParam(':email', $this->email, \PDO::PARAM_STR);
            $stmt->bindParam(':password', $this->password, \PDO::PARAM_STR);
            $stmt->bindParam(':registration_date', $this->registration_date, \PDO::PARAM_STR);
            
            $stmt->execute();
            
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function update()
    {
        try{
            $db = Database::getInstance('players.db');

            $stmt = $db->prepare("UPDATE players SET name = :name, username = :username, email = :email, password = :password 
                                    WHERE id = :id");

            $stmt->bindParam(':id', $this->id, \PDO::PARAM_STR);
            $stmt->bindParam(':name', $this->name, \PDO::PARAM_STR);
            $stmt->bindParam(':username', $this->username, \PDO::PARAM_STR);
            $stmt->bindParam(':email', $this->email, \PDO::PARAM_STR);
            $stmt->bindParam(':password', $this->password, \PDO::PARAM_STR);

            $stmt->execute();
            echo "Player Updated!";

        }catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function delete()
    {
        try {
            $db = Database::getInstance('players.db');
            $stmt = $db->prepare("DELETE FROM players WHERE id = :id");
            $stmt->bindParam(':id', $this->id, \PDO::PARAM_STR); //LOOOKKKKKK O QUE QUER DIZER
            $stmt->execute();
    
            echo "Deleted!";
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public static function getById($id)
    {
        try{
            $db = Database::getInstance('players.db');
            $stmt = $db->prepare('SELECT * FROM players WHERE id = ' . $id);
            $stmt->execute();

            $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            return $results;

        }catch (Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }

    public static function getAll()
    {
        try{
            $db = Database::getInstance('players.db');
            $stmt = $db->prepare('SELECT * FROM players');
            $stmt->execute();

            $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            return $results;

        }catch (Exception $e){
            echo "Error: " . $e->getMessage();
        }
    }
}
