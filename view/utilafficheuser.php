<?php
include_once "../controller/utilisateurC.php";
include_once '../model/Utilisateur.php';

$userC= new utilisateurC() ;

if (isset($_GET['id']) && !empty($_GET['id'])){

    $user= $userC->recupereutilisateur($_GET['id']);
}
else{ 
    echo "id not set ";}
?>
<?php include_once"header.html";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user affichage</title>
</head>
<body>
    <h3> <?php echo $user->mail; ?> </h3>
    <br>
    <h3> <?php echo $user->pwd; ?> </h3>
    <br>
    <a href=<?PHP echo 'modifierutil.php?id='.$user->pwd ?> > Modifier </a>
</body>
</html>
<?php include_once"footer.html"; ?>