<?php

namespace Core\Database;
use \Twig_Extension;
use \PDO;

class MysqlDatabase extends Twig_Extension{

    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

    public function __construct($db_name, $db_user = 'root', $db_pass = 'hgt£U!52V#§',$db_host = 'localhost')
    {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
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

    public function query($statement, $class_name = null,  $one = false ){
        $req =  $this->getPDO()->query($statement);
        if (
            strpos($statement, 'UPDATE') === 0 ||
            strpos($statement, 'INSERT') === 0 ||
            strpos($statement, 'DELETE') === 0
        ){
            return $req;
        }

        if ($class_name === null) {
               $req->setFetchMode(PDO::FETCH_OBJ);
        } else {
                $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }

        if($one) {
                $datas = $req->fetch();
        } else {
                $datas = $req->fetchAll();
        }

        return $datas;
        }

    public function prepare(){

    }


    static function articles()
    {
        $pdo = new PDO('mysql:dbname=mon_blog;host=localhost', 'root', 'hgt£U!52V#§');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        $articles = $pdo->query('SELECT * FROM articles ORDER BY id         DESC LIMIT 10');
        return $articles;
    }

    static function categories()
    {
        $pdo = new PDO('mysql:dbname=mon_blog;host=localhost', 'root', 'hgt£U!52V#§');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        $categories = $pdo->query('SELECT * FROM categories ORDER BY id DESC LIMIT 10');
        return $categories;
    }

}