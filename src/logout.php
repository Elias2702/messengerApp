<?php
session_start();
$_SESSION = array();
session_destroy();
header("Refresh: 2; url=index.php");

echo 'disconnected';

?>