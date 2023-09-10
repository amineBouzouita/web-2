<?php
include_once "../controller/ArticleC.php";


$userC= new ArticleC() ;
if (isset($_GET['id']) && !empty($_GET['id'])){
    $userC->adminsupprime($_GET['id']);
    echo 'Article  deleted';
    header('Location:ArticleAfficher.php');
}
else echo ' paste   http://localhost/web3/view/backArticlesup.php?id= desired id!!!!!!!!!!!!!!! ';

?>

<?php include_once"footer.html"; ?>