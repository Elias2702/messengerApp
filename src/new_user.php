<?php

require_once 'db_param.php';
/*$dsn = 'mysql:host=mysql;dbname=messenger';
$user_db = 'root';
$pass_db = 'root';*/

class user_cl {
    
    var $prenom;
    var $nom;
    var $sexe;
    var $pseudo;
    var $email;
    var $pass;
  

    public function __construct($pn,$n, $sx, $psd, $eml, $pass) {
        $this->prenom    =   $pn;         
        $this->nom       =   $n;          
        $this->sexe      =   $sx;         
        $this->pseudo    =   $psd;      
        $this->email     =   $eml;       
        $this->pass      =   $pass;
       
    }
};
    $pn       = $_POST['prenom'] ;
    $n        = $_POST['nom'] ;
    $sx       = $_POST['sexe'] ;
    $psd      = $_POST['pseudo'] ;
    $eml      = $_POST['email'] ;
    $pass     = $_POST['pass'] ;

    $new_user = new user_cl($pn,$n, $sx, $psd, $eml, $pass);

    try {
        $db_user = new PDO ($dsn, $user_db, $pass_db);
        $db_user -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $q_user="INSERT INTO `messenger`.`user` (`prenom`,`nom`,`sexe`,`pseudo`,`email`,`pass`) VALUES ('$pn','$n','$sx','$psd','$eml','$pass');";
        $db_user -> exec($q_user);
    } catch (Exception $ex) {
        echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
    }
    
    header("Refresh: 2; url=user_home.php");
    echo 'Registration Successful.';