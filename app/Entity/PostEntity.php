<?php

namespace App\Entity;
use Core\Entity\Entity;

class PostEntity extends Entity {

    public function getUrl(){
        return 'index.php?p=posts.show&id=' . $this->id;
    }

  /*  public function getExtrait() {
        return substr(strip_tags( $this->contenu), 0, 150);

    }*/

    public function getExtrait() {
        $html = '<p>' .substr($this->contenu,0, 150) . ' ...</p>';
        return strip_tags($html);
    }

}