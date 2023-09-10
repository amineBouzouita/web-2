<?php
include_once "../controller/CommentaireC.php";


$userC= new CommentaireC() ;
if (isset($_GET['id']) && !empty($_GET['id'])){
    $userC->adminsupprime($_GET['id']);
    echo 'Commentaire  deleted';
    header('Location:CommentaireAfficher.php');
}
else echo ' paste   http://localhost/web3/view/backCommentairesup.php?id= desired id!!!!!!!!!!!!!!! ';

?>

<?php include_once"footer.html"; ?>