<?php
// This page asks the user to fulfill the email input, then he can click the button to 
// receive an email with his password

session_start();
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Retrieve Password</title>
    </head>
    <body>
    <br>
        
        <form action='retrieve_pass_exec.php' method='POST'>

            <input type='email' name='email' placeholder='Enter you email' <?php
            
            // Autocomplete the input with $_SESSION['email'] if it exists
            if(isset($_SESSION['email'])) {
               echo "value='" . $_SESSION['email'] ."'";
            }
            ?>>
            
            <br><br>

            <input type='submit' value='Send me an email'>
            <br>
            <a href="index.php">Back to Login</a>
            <br>        

        </form>        

    </body>
</html>
