<?php

class msg_cl {
    var $id;
    var $owner_id;
    var $conv_reg_id;
    var $time; //not a passed value, but generated inplace
    var $content;

    //advanced
    /* 
    var reaction_id;    //connects to reactions table + user table
    var parent_child; //flag probably (for a single level)
    var lu/non_lu;  //flag per user
    */
    

    public function __construct($owner_id,$conv_reg_id,$content) {
        $this->owner_id      =   $owner_id;         
        $this->conv_reg_id   =   $conv_reg_id;          
        $this->time          =    date("Y-m-d H:i:s");  //not a passed value, but generated inplace       
        $this->content       =   $content;         
    }

    // methods : 1-
   /* public function crt_msg() { 
        require_once 'msg_class.php';
    $owner_id = $this->id;
    $msg_cnt = $_POST['crt_msg']; //needs checking, maybe use golbal ($_SESSION[]) variable
   
    $particip_id = $this->crt_particip_id($other_mem_id);
    $cnv_reg_id = get_convers_reg($particip_id);
   
    new_msg = new msg_cl($owner_id, $cnv_reg_id, $msg_cnt);
    return new_msg;
    } */

    // methods : 2-change conv_reg_id

    // methods : 3-change content

    // methods : 
};