<?php
namespace App\Entity;

use Core\Entity\Entity;

Class CategoryEntity extends Entity

{

    public function getUrl() {
        return 'index.php?p=posts.category&id=' . $this->id;
    }


}