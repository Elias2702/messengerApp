<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Display Characters</title>
    </head>
    <body>
       <?php
            $servername = "mysql";
            $username = "root";
            $password = "root";
            $dbname = "messenger";

            // Create connection
            $conn = new mysqli($servername, $username, $password);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT id, prenom, nom, sexe, pseudo, email, pass FROM messenger.user";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                     //while($row = $result->fetch_assoc()) {
                    //echo "<br> id: ". $row["id"]. " - Name: ". $row["prenom"]. " " . $row["nom"] . " ". $row["sexe"] . " ". $row["pseudo"] . " ". $row["email"] . " ". $row["pass"] . "<br>";
                    ?>
                    <select size="10">
                        <?php while($row = $result->fetch_assoc()){ ?>
                        <option><?php echo "<br> id: ". $row["id"]. " - Name: ". $row["prenom"]. "   " . $row["nom"] . " ". $row["sexe"] . " ". $row["pseudo"] . " ". $row["email"] . " ". $row["pass"] . "<br>"; ?></option>
                        <?php } ?>
                     </select>   
                <?php
                }
            //} else {
               // echo "0 results";
           // }
            
            
        ?>
    </body>
</html>
