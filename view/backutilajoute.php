<?php
include_once "../controller/utilisateurC.php";
include_once '../model/Utilisateur.php';

$user=null ;
$userC= new utilisateurC() ;

if( isset($_POST["mail"]) && 
    isset($_POST["pwd"]) && $_POST["select"]) {
        if (
            !empty($_POST["mail"]) && 
            !empty($_POST["pwd"]) ) {
                $user=new Utilisateur( $_POST["mail"], $_POST["pwd"] , $_POST["select"] ) ;
                $userC->adminajoute($user);
                 header('Location:backutilaffiche.php'); 
                echo "congrats new user inscrit";
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
    <title>inscription</title>
</head>
<body>
    <form action="" method="post">
    <label for="mail">mail</label>
    <input type="text" name="mail" id="mail" placeholder="mail">
    <label for="pwd">password</label>
    <input type="text" name="pwd" id="pwd">
    <select name="select" id="select">
       
        <option value= "user"> user</option>
        <option value= "organisateur"> organisateur</option>
        <option value= "admin"> admin</option>    
    </select>
    <input type="submit" value="se connecter">
    
</form>

</body>
</html>

<?php include_once"footer.html"; ?>