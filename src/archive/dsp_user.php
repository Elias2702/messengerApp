<?php

    echo '<span>';
    echo '<legend><p>List of Members</p>';
    echo '';
     foreach ($result as $row) {
        echo "<option>"."<br> id: ". $row["id"]. " - Name: ". $row["prenom"]. "   " . $row["nom"] . " ". $row["sexe"] . " ". $row["pseudo"] . " ". $row["email"] . " ". $row["pass"] . "<br> "."</option>";
         } 
        echo '</select>';
        echo '</legend>';    
    echo '</span>';             