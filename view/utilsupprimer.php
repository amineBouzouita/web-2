<?php
include_once "../controller/utilisateurC.php";
include_once '../model/Utilisateur.php';

$userC= new utilisateurC() ;
if (isset($_GET['id']) && !empty($_GET['id'])){
    $userC->adminsupprime($_GET['id']);
    echo 'user deleted';

}
else echo 'finou id user ?';

?>

<?php include_once"footer.html"; ?>