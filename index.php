<?php 
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
$content = ob_get_clean();
include('./pages/templates/default.php');
?>