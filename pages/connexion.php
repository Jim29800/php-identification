<?php
if (empty($_SESSION['connexion']) || !isset($_SESSION['connexion'])){
?>
<div class="col-xs-4">
    <form action="" method="post">
        <ul class="list-unstyled">
        <li>
            <label for="pseudo" class="col-xs-6">Pseudo* :</label>
            <input required type="text" name="pseudo" id="pseudo" value="<?= isset($_POST['pseudo']) ? $_POST['pseudo'] : "" ?>">
        </li>
            </li>
                <label for="password" class="col-xs-6">Mot de passe* :</label>
                <input required type="password" name="password" id="password">
            </li>
            <li>
                <input name="valider" class="col-xs-offset-8" type="submit" value="S'enregistrer">
            </li>
        </ul>
    </form>
</div>
<?php
}else{
?>
<div class="col-xs-4">
    <form action="" method="post">
    <input name="deconnexion" class="col-xs-offset-8" type="submit" value="Déconnexion">
    </form>
<div>
<?php
}
if (isset($_POST["deconnexion"])){
    session_destroy();
    header("Location: index.php");
};

if (isset($_POST["valider"])){
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mdp = htmlspecialchars($_POST['password']);
    $sql_connexion = sprintf('SELECT * FROM uti_utilisateur');
    $result_connexion = $bdd->query($sql_connexion);

    foreach ($result_connexion as $key => $value) {
        if ($value['uti_pseudo'] == $pseudo && password_verify($mdp, $value['uti_password'])){
            $_SESSION['connexion'] = "Vous êtes identifié en tant que : ".$pseudo;
            header("Location: index.php");
        }
    };
};
?>