<?php 

class user_cl {
    
    var $id; 
    var $prenom;
    var $nom;
    var $sexe;
    var $pseudo;
    var $email;
    var $pass;

    public function __construct($id,$pn,$n, $sx, $psd, $eml, $pass) {
        $this->id    =$id;
        $this->prenom    =   $pn;         
        $this->nom       =   $n;          
        $this->sexe      =   $sx;         
        $this->pseudo    =   $psd;      
        $this->email     =   $eml;       
        $this->pass      =   $pass;

        //public function 
        
    }
// methods :create particip_id
    //IDEA & CODE :complements of Antoine
    //needs to be adapted for more than 2 participants (maybe using recursion!)

    public function crt_particip_id($other_mem_id) {
        if($other_mem < $cur_mem_id) {
            $particip_id = $other_mem . " " . $cur_mem_id;
            return $particip_id;
        } else {
            $particip_id = $cur_mem_id . " " . $other_mem;
            return $particip_id ; //keep return here until (no conversation with self) check is PERFORMED
        }
    }
/////end method///////////////////////

    // methods : get my conversations // for the picker-panel

    public function get_my_cnv($mem_id) {
//require_once 'db_param.php';
$db_cnct = dbase_con();
$cur_mem = $mem_id;
    try {        
        $q_conv_reg="SELECT * FROM messenger.conv_reg WHERE `particip_id` LIKE '%$cur_mem%';";
        $result = $db_cnct -> query("$q_conv_reg")->fetchAll();
    
        return $result;
    } catch (Exception $ex) {
        echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
    } 


    }
/////end method///////////////////////

    // methods : 1- create msg
       
//////end method///////////////////////

    // methods :1-2-send msg   


  public function send_msg($msg) {
    //require_once 'db_param.php';
   $db_cnct = dbase_con();

    $owner_id = $msg->owner_id;
    $msg_crt_time = $msg->msg_crt_time;
    $conv_reg_id = $msg->conv_reg_id;
    $msg_cnt = $msg->msg_cnt;

    if($msg_cnt != '') {  
        try {      
                //$msg_crt_time = date("Y-m-d H:i:s");           
                $q_msg_ins = "INSERT INTO `messenger`.`messages` (`owner_id`, `conv_reg_id`, `time`, `content`) VALUES ('$owner_id', '$conv_reg_id', '$msg_crt_time', '$msg_cnt');";
                $db_cnct -> exec($q_msg_ins);                      
            } catch (Exception $ex) {                    
                    echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
            }
        }
 }

//////end method///////////////////////

    // methods : 1-1- add friend //intermediate



    // methods : 2-edit msg

    // methods : 3-delete msg

    // methods :reply to a specific msg (change msg property [parent],and the reply sub-msg will be [child])

    // methods :5-add reaction to a msg/sub-msg

    // methods :6-mark conversation (favourite/important/mute notifications)

    // methods :7-add member to conversation

    // methods :leave conversation 

}
