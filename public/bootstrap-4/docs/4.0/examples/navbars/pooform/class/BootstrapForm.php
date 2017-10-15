<?php
namespace Tutoriel\HTML;
/**
 * Created by PhpStorm.
 * User: LSM
 * Date: 30/09/2017
 * Time: 14:59
 */

Class BootstrapForm extends Form {

    /***
     *@param $html string Code HTML à entourer
     *@return string
     */
    protected function surround($html) {

        return "<div class=\"form-group\">{$html}</div>";
        }

    /***
     *@param $name string
     *@return string
     */
    public function input($name) {

        return $this->surround(
            '<label>' .$name . '</label><input type="text" name="'.$name.'" value="'.$this->getValue($name).'" class="form-control">'
            );
        }

    /***
     *@return string
     */
    public function submit() {

        return $this->surround(
            '<button type="submit" class="btn btn-primary">Envoyer</button>'
            );
        }
    }

