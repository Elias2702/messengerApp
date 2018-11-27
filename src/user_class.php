<?php 

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

?>