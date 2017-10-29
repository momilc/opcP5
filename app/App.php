<?php
use Core\Config;
use Core\Database\MysqlDatabase;

class App extends Twig_Extension
{
    public $title = 'Blog Mo Opcr P5';
    private $db_instance;
    private static $_instance;

    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new App();
        }
        return self::$_instance;
    }

    public static function load() {
        session_start();
        require ROOT. '/app/Autoloader.php';
        App\Autoloader::register();
        require ROOT. '/core/Autoloader.php';
        Core\Autoloader::register();
    }

    public function getTable($name) {
        $class_name = '\\App\\Table\\' .ucfirst($name) . 'Table';
            return new $class_name($this->getDb());
    }

    public function getDb() {
        $config = Config::getInstance(ROOT. '/config/config.php');
        if(is_null($this->db_instance)){
            $this->db_instance = new MysqlDatabase ($config->get('db_name'), $config->get('db_user'), $config->get('db_pass'), $config->get('db_host'));
        }
        return $this->db_instance;
    }

    public function getFilters()
    {
        return [
            new Twig_SimpleFilter('markdown', [$this, 'markdownParse'],['is_safe' =>['html']])];
    }

    public function markdownParse($value) {

        return \Michelf\MarkdownExtra::defaultTransform($value);
    }

    public function getFunctions()
    {
        return [
            new Twig_SimpleFunction('activeClass', [$this, 'activeClass'], ['needs_context' => true])
        ];
    }

    public function activeClass(array $context, $page) {
        if (isset($context['current_page']) && $context['current_page'] === $page){
            return ' active ';
        } return null;
    }
}