<?php

session_start();

require_once 'db_param.php';

?>


<form action="send_msg.php" method="POST">


        <textarea cols="120" rows="5"  name='content'></textarea>


        <button type="submit">SEND</button>

        

</form>
