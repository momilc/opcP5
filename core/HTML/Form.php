<?php
namespace Core\HTML;


class Form extends \Twig_Extension {
    /***
     *@var array Données utilisées par le formulaire
     */
    protected $data;

    /***
     *@var string Tag utilisé  pour entourer les champs
     */
    public $surround = 'p';

    /***
     *@param array $data Données utilisées par le formulaire
     */

    public function __construct($data = array()) {
        $this->data = $data;
    }

    /***
     * @param $html string Code HTML à entourer
     * @param $label
     * @return string
     */
    protected function surround($html, $label) {
        return "<{$this->surround}>{$html}{$label}</{$this->surround}>";
    }

    /***
     *@param $index string Index de la valeur à récupérer
     *@return string
     */

    protected function getValue($index) {
        if(is_object($this->data)) {
            return $this->data->$index;
        }
            return isset($this->data[$index]) ? $this->data[$index] : null;
    }

    /***
     * @param $name string
     * @param $label
     * @param array $options
     * @return string
     */

    public function input($name, $label, $options = []) {
        $type = isset($label, $options['type']) ? $options['type'] : 'text';
        return $this->surround('<input type="'.$type.'" name="'.$name.'" value"'.$this->getValue($name).'">', '<label>'.$label.'</label>');
    }

    /***
     *@return string
     */

    public function submit() {
        return $this->surround('<button type="submit">Envoyer</button>', null);
    }

}
