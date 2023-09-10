<?php
include_once "../controller/UserC.php";
include_once '../model/User.php';

$userC= new UserC() ;
if (isset($_GET['id']) && !empty($_GET['id'])){
    $userC->adminsupprime($_GET['id']);
    echo 'user deleted';
    header('Location:UserAfficher.php');

}
else echo 'finou id user ?';

?>

<?php include_once"footer.html"; ?>