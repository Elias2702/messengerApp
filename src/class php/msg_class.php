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
    

    public function __construct($pn,$n, $sx, $psd, $eml, $pass) {
        $this->owner_id      =   $owner_id;         
        $this->conv_reg_id   =   $conv_reg_id;          
        //$this->time          =    $time;  //not a passed value, but generated inplace       
        $this->content       =   $content;         
    }

    // methods : 1-

    // methods : 2-change conv_reg_id

    // methods : 3-change content

    // methods : 
};