<?php
$nom = htmlspecialchars($_POST['nom']);
$prenom = htmlspecialchars($_POST['prenom']);
$pseudo  = htmlspecialchars($_POST['pseudo']);
$age = htmlspecialchars($_POST['age']);
$email = htmlspecialchars($_POST['email']);
$mdp = htmlspecialchars($_POST['password']);
$mdp_verif = htmlspecialchars($_POST['password_verif']);
try    
{
    $bdd = new PDO('mysql:host=localhost;dbname=annonces_pf;charset=utf8', 'root', 'admin');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
};
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
            echo "<h1>Email déjà utilisé !</h1><br>";
            return true;
        }elseif($pseudo === $value['uti_pseudo']){
            echo "<h1>Pseudo déjà utilisé !</h1><br>";
            return true;            
        }
    }
    return false;
};
//---------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------------

if (!isset($mdp)) {
    echo "Aucun mot de passe choisi";
}
elseif (strlen($mdp) < 8) {
    echo "le mot de passe est trop court";
}
elseif ($mdp !== $mdp_verif ){
    echo "les mots de passe de correspondent pas";
}
elseif (verification($bdd,$email,$pseudo)) {
    echo "<h2>Erreur lors de la création du compte.</h2><br>";
}
else{
    $mdp = password_hash($mdp,PASSWORD_DEFAULT);
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