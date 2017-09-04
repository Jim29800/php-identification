<?php
$nom = htmlspecialchars($_POST['nom']);
$prenom = htmlspecialchars($_POST['prenom']);
$pseudo  = htmlspecialchars($_POST['pseudo']);
$age = htmlspecialchars($_POST['age']);
$email = htmlspecialchars($_POST['email']);
$mdp = htmlspecialchars($_POST['password']);
$mdp_verif = htmlspecialchars($_POST['password_verif']);

if (isset($mdp)) {
    echo "Aucun mot de passe choisi";
}
elseif ($mdp.strlen < 8) {
    echo "le mot de passe est trop court";
}
elseif ($mdp !== $mdp_verif ){
    echo "les mots de passe de correspondent pas";
};
$sql = sprinf(
    "INSERT INTO uti_utilisateur VALUE uti_nom = '%s', uti_prenom = '%s', uti_age = %d, 
    uti_email = '%s', uti_pseudo,uti_password = '%s'", $nom, $prenom, $age, $email, $pseudo, $mdp
);
$bdd->query($sql);