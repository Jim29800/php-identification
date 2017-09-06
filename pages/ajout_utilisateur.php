
<div class="col-xs-6">
    <form action="" method="post">
        <ul class="list-unstyled">
            <li>
                <label for="nom" class="col-xs-6">Nom :</label>
                <input type="text" name="nom" id="nom" value="<?= isset($_POST['nom']) ? $_POST['nom'] : "" ?>">
            </li>
            <li>
                <label for="prenom" class="col-xs-6">Prénom :</label>
                <input type="text" name="prenom" id="prenom" value="<?= isset($_POST['prenom']) ? $_POST['prenom'] : "" ?>">
            </li>
            <li>
                <label for="age" class="col-xs-6">Age :</label>
                <input type="number" name="age" id="age" value="<?= isset($_POST['age']) ? $_POST['age'] : "" ?>">
            </li>
            <li>
                <label for="pseudo" class="col-xs-6">Pseudo* :</label>
                <input required type="text" name="pseudo" id="pseudo" value="<?= isset($_POST['pseudo']) ? $_POST['pseudo'] : "" ?>">
            </li>
                <label for="email" class="col-xs-6">Email :</label>
                <input type="email" name="email" id="email" value="<?= isset($_POST['email']) ? $_POST['email'] : "" ?>">
            <li>
            </li>
                <label for="password" class="col-xs-6">Mot de passe* :</label>
                <input required type="password" name="password" id="password">
            </li>
            </li>
                <label for="password_verif" class="col-xs-6">Mot de passe vérification* :</label>
                <input required type="password" name="password_verif" id="password_verif">
            </li>
            <li>
                *Obligatoire
            </li>
            <li>
                <br>
                <input name="valider" class="col-xs-offset-8" type="submit" value="S'enregistrer">
            </li>
        </ul>
    </form>
</div>
<div class="col-xs-6">
<p class='text-danger'>
    <?php
    if(isset($_POST["valider"])){
        include("traitement_ajout_utilisateur.php");
    };
    ?>
    </p>
</div>