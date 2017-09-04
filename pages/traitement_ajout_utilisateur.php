<?php
$nom = htmlspecialchars($_POST['nom']);
$prenom = htmlspecialchars($_POST['prenom']);
$pseudo  = htmlspecialchars($_POST['pseudo']);
$age = htmlspecialchars($_POST['age']);
$email = htmlspecialchars($_POST['email']);
$mdp = htmlspecialchars($_POST['password']);
$mdp_verif = htmlspecialchars($_POST['password_verif']);

if (!isset($mdp)) {
    echo "Aucun mot de passe choisi";
}
elseif (strlen($mdp) < 8) {
    echo "le mot de passe est trop court";
}
elseif ($mdp !== $mdp_verif ){
    echo "les mots de passe de correspondent pas";
}
else{
    try    
    {
        $bdd = new PDO('mysql:host=localhost;dbname=annonces_pf;charset=utf8', 'root', 'admin');
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    };
    $sql = sprintf(
        "INSERT INTO uti_utilisateur (uti_nom, uti_prenom, uti_age, uti_email, uti_pseudo,uti_password) 
        VALUE ('%s', '%s', %d, '%s',  '%s',  '%s')", $nom, $prenom, $age, $email, $pseudo, $mdp
    );
    try    
    {
        $bdd->query($sql);
        echo "<h1>Bienvenue ".$pseudo."</h1>";
        echo "<p>Votre inscription c'est correctemnt effectué</p>";
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    };
};