<?php
include_once "../controller/ctgC.php";


$userC= new ctgC() ;
if (isset($_GET['id']) && !empty($_GET['id'])){
    $userC->adminsupprime($_GET['id']);
    echo 'ctg  deleted';

}
else echo ' paste   http://localhost/web3/view/backctgsup.php?id= desired id!!!!!!!!!!!!!!! ';

?>

<?php include_once"footer.html"; ?>