<?php 
session_start();
isset($_SESSION['nbpassage']) ?  $_SESSION['nbpassage']++ : $_SESSION['nbpassage']=1;
//--------------------------MESSAGE INSCRIPTION--------------------------------------//
if (isset($_SESSION['inscription']) ){
    echo $_SESSION['inscription'];
    $_SESSION['inscription'] = "";
}else{
    $_SESSION['inscription'] = "";
};
echo "Compteur de session : ".$_SESSION['nbpassage']."<br>";
//--------------------------MESSAGE CONNEXION--------------------------------------//
echo isset($_SESSION['connexion']) ? $_SESSION['connexion'] : "Vous n'êtes pas prêts !";
//--------------------------DEBUT CONNEXION--------------------------------------//
try    
{
    $bdd = new PDO('mysql:host=localhost;dbname=annonces_pf;charset=utf8', 'root', 'admin');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
};
//--------------------------FIN CONNEXION--------------------------------------//
if(isset($_GET['p'])){
    $p = $_GET['p'];
}else{
    $p = 'accueil';
}
ob_start();
if($p === 'accueil'){
    include('./pages/accueil.php');
}
if($p === 'ajout_utilisateur'){
    include('./pages/ajout_utilisateur.php');
}
if($p === 'traitement_ajout_utilisateur'){
    include('./pages/traitement_ajout_utilisateur.php');
}
if($p === 'connexion'){
    include('./pages/connexion.php');
}
$content = ob_get_clean();
include('./pages/templates/default.php');


?>