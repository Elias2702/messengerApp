<?php 

class Autoloader{

    static function register(){
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    static function autoload($class_name){
        require 'class/' . $class_name . '.php';        
        // pour que ça marche, mettre toutes les classes dans un dossier class/
    }

}

?>


// à insérer dans index.php
<?php
require 'class/Autoloader.php';
Autoloader::register();
// à insérer dans index.php
?>