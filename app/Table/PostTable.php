<?php
/**
 * Created by PhpStorm.
 * User: LSM
 * Date: 02/10/2017
 * Time: 23:39
 */

namespace App\Table;
use Core\Table\Table;
use \PDO;

class PostTable extends Table
{
    protected $table = 'articles';

    /**
     * Récupère les derniers posts
     * @return array
     */
    public function last() {
        return $this->query("
        SELECT articles.id, articles.titre, articles.contenu, articles.date, categories.titre as categorie
        FROM articles
        LEFT JOIN categories ON category_id = categories.id
        ORDER BY articles.date DESC");
    }

  /*  function last()
    {
        $pdo = new PDO('mysql:dbname=mon_blog;host=localhost', 'root', 'hgt£U!52V#§');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        $blog = $pdo->query('SELECT * FROM articles ORDER BY id DESC LIMIT 10');
        return (array($blog));
    }*/

    /**
     * Récupère les derniers articles de la catégorie demandée
     * @param $category_id int
     * @return array
     */
    public function lastByCategory($category_id) {

        return $this->query("
        SELECT articles.id, articles.titre, articles.contenu, articles.date, categories.titre as categorie
        FROM articles
        LEFT JOIN categories ON category_id = categories.id
        WHERE articles.category_id = ?
        ORDER BY articles.date DESC"
            , [$category_id]);
    }

    /**
     * Récupère un article en liant la catégorie associée
     * @param $id int
     * @return \App\Entity\PostEntity
     */
    public function findWithCategory($id) {

        return $this->query("
        SELECT articles.id, articles.titre, articles.contenu, articles.date, categories.titre as categorie
        FROM articles
        LEFT JOIN categories ON category_id = categories.id
        WHERE articles.id = ?", [$id], true);
    }
}

