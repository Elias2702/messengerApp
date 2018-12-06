<?php

session_start();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>chose emoji</title>
</head>
<body>

<?php

require_once 'db_param.php';

try {
    // Set connection to the database
    $db = new PDO ($dsn, $user_db, $pass_db);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    

    $q_emojis="SELECT * FROM emojis ";
    $res = $db->query($q_emojis)->fetchAll(PDO::FETCH_ASSOC);

    foreach($res as $row) {
     
        echo "<button class='emo_btn' type='submit'><img class='smiley' src='" . $row['img'] . "' alt='smiley'/></button>";

    }

} catch (Exception $ex) {
    echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
}


?>