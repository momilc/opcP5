<?php
/**
 * Created by PhpStorm.
 * User: LSM
 * Date: 02/10/2017
 * Time: 23:39
 */

namespace App\Table;
use Core\Table\Table;


class PostTable extends Table
{
    protected $table = 'articles';

    /**
     * Récupère les derniers posts
     * @return array
     */
    public function last() {
        return $this->query("
        SELECT articles.id, articles.titre, articles.chapo, articles.contenu, articles.auteur, articles.date
        FROM articles
        ORDER BY articles.date DESC");
    }


    /**
     * Récupère les derniers articles de la catégorie demandée
     * @param $category_id int
     * @return array
     */


    /**
     * Récupère un article en liant la catégorie associée
     * @param $id int
     * @return \App\Entity\PostEntity
     */
    public function findWithCategory($id) {

        return $this->query("
        SELECT articles.id, articles.titre, articles.chapo, articles.contenu, articles.auteur, articles.date_modif
        FROM articles
        WHERE articles.id = ?", [$id], true);
    }

}

