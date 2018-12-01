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

    // methods : 1-display :get all msgs from message-table where this->id_of_particip = id_of_particip

    // methods : 2-change num_of_particip : //will be changed by the action of method 3

    // methods : 3-change id_of_particip add/ remove member from id_of_particip column

    // methods : 
};