<?php

session_start();

require_once 'db_param.php';

?>


<form class="fw row no-margin" method="POST" action='send_msg.php'>
        
        <input type="text" class="textarea" name='content' <?php if($_POST['content'] != null){ echo "action='send_msg.php'";}?>placeholder="Ecrivez un message..">

</form>
