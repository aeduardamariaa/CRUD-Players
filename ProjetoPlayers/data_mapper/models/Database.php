<?php

namespace models;

use Exception;

class Database
{
    private static $db;

    private function __construct(){}

    public static function getInstance($adress): \PDO
    {
        try {
            if (!isset(self::$db)) {
                self::$db = new \PDO('sqlite:'. $adress);
                self::$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                self::$db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
            }
            return self::$db;
        } catch (Exception $e) {
            echo 'Erro: ' . $e->getMessage();
            throw $e;
        }
    }

    public function closeInstance()
    {
        self::$db = null;
    }
}
