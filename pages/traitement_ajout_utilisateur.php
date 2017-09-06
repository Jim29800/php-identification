<?php
$nom = htmlspecialchars($_POST['nom']);
$prenom = htmlspecialchars($_POST['prenom']);
$pseudo  = htmlspecialchars($_POST['pseudo']);
$age = htmlspecialchars($_POST['age']);
$email = htmlspecialchars($_POST['email']);
$mdp = htmlspecialchars($_POST['password']);
$mdp_verif = htmlspecialchars($_POST['password_verif']);

//---------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------

function verification($connexion, $mail, $pseudo){
    $sql_verif_mail = sprintf(
        'SELECT * FROM uti_utilisateur WHERE uti_email = "%s" OR uti_pseudo = "%s"',$mail, $pseudo
    );
    try{
        $result_verif_mail = $connexion->query($sql_verif_mail);
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    };
    foreach ($result_verif_mail as $key => $value) {
        if ($mail === $value['uti_email']){
            echo "Email déjà utilisé !<br>";
            return true;
        }elseif($pseudo === $value['uti_pseudo']){
            echo "Pseudo déjà utilisé !<br>";
            return true;            
        }
    }
    return false;
};
//---------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------
$erreur ="";
if (!isset($mdp)) {
    $erreur .= "Aucun mot de passe choisi.<br>";
}
if (strlen($mdp) < 8) {
    $erreur .= "Le mot de passe est trop court.<br>";
}
if ($mdp !== $mdp_verif ){

    $erreur .= "Les mots de passe de correspondent pas.<br>";
}
if (verification($bdd,$email,$pseudo)) {
    $erreur .= "Erreur lors de la création du compte.<br>";
}
if (empty($erreur)){
    $mdp = password_hash($mdp,PASSWORD_DEFAULT);
    $sql = sprintf(
        "INSERT INTO uti_utilisateur (uti_nom, uti_prenom, uti_age, uti_email, uti_pseudo,uti_password) 
        VALUE ('%s', '%s', %d, '%s',  '%s',  '%s')", $nom, $prenom, $age, $email, $pseudo, $mdp
    );
    try    
    {
        $bdd->query($sql);
        $_SESSION["inscription"] = "<h1>Bienvenue ".$pseudo."</h1></br>"."<p>Votre inscription c'est correctemnt effectué</p>";
        
    }   
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    };
    header("Location: index.php");
}else{
    $erreur;
};
