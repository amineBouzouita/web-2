<?php

include_once "../controller/UserC.php";
include_once '../model/User.php';
$user=null;
$userC= new userC() ;

if( isset($_POST["mail"]) && 
    isset($_POST["pwd"]) ) {
        if (
            !empty($_POST["mail"]) && 
            !empty($_POST["pwd"]) ) {
                $user=new user( $_POST["mail"], $_POST["pwd"] , "user" ) ;
                $userC->adminmodifieuser($user,$_GET['id']);
                 header('Location:UserAfficher.php'); 
                echo "congrats  user mopdified";
            }
        else 
            $error = "Missing information";    
    }

?>
<?php include_once"header.html";?>
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

$user= $userC->recupereuser($_GET['id']);
    echo $user->mail;

?>
   <form action="" method="post">
    <label for="mail">mail</label>
    <input type="text" name="mail" id="mail" value=<?php echo $user->mail ;?> >
    <label for="pwd">password</label>
    <input type="text" name="pwd" id="pwd"  value=<?php echo $user->pwd ?> >
    <input type="submit" value="se connecter">
    
</form>
<?php  }
else{ echo "id not set ";}
?>
</body>
</html>

<?php include_once"footer.html"; ?>