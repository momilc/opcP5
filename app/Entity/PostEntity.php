<?php

namespace App\Entity;
use Core\Entity\Entity;

class PostEntity extends Entity {


	/**
	 * @return string
	 */
	public function getUrl(){
        return 'index.php?p=posts.show&id=' . $this->id;
    }


	/**
	 * @return string
	 */
	public function getExtrait() {
        $html = '<p>' . substr($this->contenu, 0, 150) . '...</p>';
        return strip_tags($html);
    }





}