<?php
session_start();
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>User LOGIN</title>
    </head>
    <body>
    <br>
        
        <form action='testuser.php' method='POST'>

            <input type='email' name='email' placeholder='Enter you email' <?php
            if(isset($_SESSION['email'])) {
               echo "value='" . $_SESSION['email'] ."'";
            }
            ?>>
            <br><br>
            <input type='password' name='pass' placeholder='Enter you user password'>
            <br><br>
            <input type='submit' value='LOGIN'>
            <br><br>        

        </form>

        <br>
        <p>Not a member yet ?</p>
        <button onclick="location.href='formulaire.php'">Register</button>

    </body>
</html>
