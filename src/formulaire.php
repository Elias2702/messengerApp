<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <title>Formulaire d'inscription</title>
    </head>
    <body>
        <div class="container grey">
            <h2>Formulaire d'inscription :</h2>
            <br>
            <form action="cible.php" method="POST">
                <div class="form-group row">  
                    <label for="prenom" class="col-sm-2 col-form-label">Prénom : </label>
                    <div class="col-sm-10">
                        <input type="text" name="prenom" placeholder="Entrez votre prénom"/>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="nom" class="col-sm-2 col-form-label">Nom :</label>
                    <div class="col-sm-10">
                        <input type="text" name="nom" placeholder="Entrez votre nom"/>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="sexe" class="col-sm-2 col-form-label">Sexe :</label>
                    <div class="col-sm-10">
                        <select name="sexe">
                            <option value="homme">Homme</option>
                            <option value="femme">Femme</option>
                            <option value="saispas">Je ne sais pas</option>                
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="pseudo" class="col-sm-2 col-form-label">Pseudo :</label>
                    <div class="col-sm-10">
                        <input type="text" name="pseudo" placeholder="Choisissez un pseudo"/> 
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email :</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" placeholder="Entrez votre email"/>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="pass1" class="col-sm-2 col-form-label">Mot de passe :</label>
                    <div class="col-sm-10">
                        <input type="password" name="pass1" placeholder="Choisissez un mot de passe"/>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="pass2" class="col-sm-2 col-form-label">Confirmer le mot de passe :</label>
                    <div class="col-sm-10">
                        <input type="password" name="pass2" placeholder="Répétez le mot de passe"/>
                    </div>
                </div>
                <br>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="condgen" id="cg" />
                    
                        <label class="custom-control-label" for="cg">J'accepte les conditions générales </label><br>
                    
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Valider</button>
                <br>
            </form>
            </div>

    </body>
</html>