<?php 

class user_cl {
    
    var $id; // added to comply with the NEW OOP version
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

    // methods : 1- create msg
    public function crt_msg() { 
        $owner_id = $this->id;
        $msg_cnt = $_POST['crt_msg'];
        $other_mem_pseudo = $_POST['mem_sel'];

       
        new_msg = new msg_cl($owner_id, $cnv_ident, $msg_cnt);
    } //end method///////////////////////

    

    // methods : 1-1- add friend

    // methods :1-2-send msg

    // methods : 2-edit msg

    // methods : 3-delete msg

    // methods :reply to a specific msg (change msg property [parent],and the reply sub-msg will be [child])

    // methods :5-add reaction to a msg/sub-msg

    // methods :6-mark conversation (favourite/important/mute notifications)

    // methods :7-add member to conversation

    // methods :leave conversation 


