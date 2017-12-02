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
        SELECT articles.id, articles.titre, articles.contenu, articles.date, auteurs.pseudo as auteur, categories.titre as categorie
        FROM articles
        LEFT JOIN categories ON category_id = categories.id
        LEFT JOIN auteurs ON auteur_id = auteurs.id
        ORDER BY articles.date DESC");
    }


    /**
     * Récupère les derniers articles de la catégorie demandée
     * @param $category_id int
     * @return array
     */
    public function lastByCategory($category_id) {

        return $this->query("
        SELECT articles.id, articles.titre, articles.contenu, articles.date, categories.titre as categorie, auteurs.pseudo as auteur 
        FROM articles
        LEFT JOIN categories ON category_id = categories.id
        LEFT JOIN auteurs ON auteur_id = auteurs.id
        WHERE articles.category_id = ?
        ORDER BY articles.date DESC"
            , [$category_id]);
    }


    /**
     * Récupère les derniers articles de l'auteur demandé
     * @param $auteur_id int
     * @return array
     */
    public function lastByAuteur($auteur_id) {

        return $this->query("
        SELECT articles.id, articles.titre, articles.contenu, articles.date, auteurs.pseudo as auteur, categories.titre as categorie
        FROM articles
        LEFT JOIN categories ON category_id = categories.id
        LEFT JOIN auteurs ON auteur_id = auteurs.id
        WHERE articles.auteur_id = ?
        ORDER BY articles.date DESC"
            , [$auteur_id]);
    }

    /**
     * Récupère un article en liant la catégorie associée
     * @param $id int
     * @return \App\Entity\PostEntity
     */
    public function findWithCategory($id) {

        return $this->query("
        SELECT articles.id, articles.titre, articles.contenu, articles.date_modif, categories.titre as categorie, auteurs.pseudo as auteur
        FROM articles
        LEFT JOIN categories ON category_id = categories.id
        LEFT JOIN auteurs ON auteur_id = auteurs.id
        WHERE articles.id = ?", [$id], true);
    }

}

