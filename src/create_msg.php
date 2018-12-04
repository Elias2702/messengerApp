<?php

session_start();

require_once 'db_param.php';

?>


<form action="send_msg.php" method="POST">

        <input type='text' name='content'>


        <button type="submit">SEND</button>

</form>
