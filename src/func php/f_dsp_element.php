<?php

// purpose : display database query in different elements dynamically

function dsp_element( $elem , $data  ) {

    echo "<" . $elem . ">". $data ."</" . $elem . ">" ;
    
} //end function