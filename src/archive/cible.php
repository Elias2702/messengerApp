<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Ma page web</title>
    </head>
    <body>
        <p><?php echo htmlspecialchars($_POST['prenom']); ?> </p>
        <p><?php echo htmlspecialchars($_POST['nom']); ?> </p>
        <p><?php echo htmlspecialchars($_POST['sexe']); ?> </p>
        <p><?php echo htmlspecialchars($_POST['pseudo']); ?> </p>
        <p><?php echo htmlspecialchars($_POST['email']); ?> </p>
        <p><?php echo htmlspecialchars($_POST['pass1']); ?> </p>
        <p><?php echo htmlspecialchars($_POST['pass2']); ?> </p>
    
        <button href="formulaire.php">Retour</button>
        <button href="#">Valider</button>

    </body>
</html>