<?php

include_once "../controller/utilisateurC.php";
include_once '../model/Utilisateur.php';
$user=null;
$userC= new utilisateurC() ;

if( isset($_POST["mail"]) && 
    isset($_POST["pwd"]) &&  isset($_POST["pwd"]) ) {
        if (
            !empty($_POST["mail"]) && 
            !empty($_POST["pwd"]) ) {
                $user=new Utilisateur( $_POST["mail"], $_POST["pwd"] , $_POST["select"] ) ;
                $userC->adminmodifieutilisateur($user,$_GET['id']);
                 header('Location:backutilmodifie.php'); 
                echo "congrats  user mopdified";
            }
        else 
            $error = "Missing information";    
    }

?>
<?php include_once"headerback.html";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modifier</title>
</head>
<body>
<?php
if (isset($_GET['id']) && !empty($_GET['id'])){

$user= $userC->recupereutilisateur($_GET['id']);
    echo $user->mail;

?>
   <form action="" method="post">
    <label for="mail">mail</label>
    <input type="text" name="mail" id="mail" value=<?php echo $user->mail ;?> >
    <label for="pwd">password</label>
    <input type="text" name="pwd" id="pwd"  value=<?php echo $user->pwd ?> >
    <select name="select" id="select">
       
       <option value= "user"> user</option>
       <option value= "organisateur"> organisateur</option>
       <option value= "admin"> admin</option>    
   </select>
    <input type="submit" value="se connecter">
    
</form>
<?php  }
else{ echo "id not set ";}
?>
</body>
</html>
<?php include_once"footer.html"; ?>