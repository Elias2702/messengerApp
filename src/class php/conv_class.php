<?php



class conv_cl {
    var $id;
    var $num_of_particip;
    var $id_of_particip;
    var $time;    
    

    public function __construct($num_of_particip, $id_of_particip) {
        $this->num_of_particip     =   $num_of_particip;         
        $this->id_of_particip   =   $id_of_particip;          
        $this->time          =    $time;   //not a passed value, but generated inplace      
                
    }

    // methods : 1-get :get all msgs from message-table where this->id_of_particip = id_of_particip
  
    public function get_convers_msg($cnv_ident) {
        require_once './func php/f_db_con.php';
        $db_cnct = dbase_con();
        
    try {
        $q_msg_dsp ="SELECT * FROM messenger.messages WHERE `conv_reg_id` = '$cnv_ident' ;";
        //$q_msg_dsp ="SELECT `content` FROM messenger.messages WHERE `conv_reg_id` = '$conv_reg_id' ;"; // select * || `content`
        $msg_list = $db_cnct -> query("$q_msg_dsp")->fetchAll();
        //$msg_list_f = $db_cnct -> query("$q_msg_dsp")->fetchAll();

        return $msg_list;
        } catch (Exception $ex) {
            echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
        }   
    
    }
//////end method///////////////////////

// methods : display a single message that belong to a single conversation
    //to be used with foreach loop
    public function dsp_element( $elem , $data  ) {

    echo "<" . $elem . ">". $data ."</" . $elem . "><br>" ;
    
}

//////end method///////////////////////
    // methods : 2-change num_of_particip : //will be changed by the action of method 3

    // methods : 3-change id_of_particip add/ remove member from id_of_particip column

    // methods : 
};