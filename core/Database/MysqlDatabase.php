<?php

namespace Core\Database;
use \PDO;

class MysqlDatabase extends Database {

    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

    public function __construct($db_name, $db_user = 'root', $db_pass = 'hgt£U!52V#§',$db_host = 'localhost')
    {
        $this->db_name = $db_name;
        $this->db_name = $db_user;
        $this->db_name = $db_pass;
        $this->db_name = $db_name;
    }

    private function getPDO() {
        if ($this->pdo === null) {

            $pdo = new PDO('mysql:db_name=mon_blog:host=localhost', 'root', 'hgt£U!52V#§');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $this->pdo = $pdo;
        }

        return $this->pdo;
    }
}