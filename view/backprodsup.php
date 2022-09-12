<?php
include_once "../controller/produitC.php";


$userC= new ProduitC() ;
if (isset($_GET['id']) && !empty($_GET['id'])){
    $userC->adminsupprime($_GET['id']);
    echo 'usprod  deleted';

}
else echo 'finou id poro ?';

?>

<?php include_once"footer.html"; ?>