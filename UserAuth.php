<?php
include_once "../controller/UserC.php";
include_once '../model/User.php';

session_start();
$user=null ;
$userC= new UserC() ;

if( isset($_POST["mail"]) && 
    isset($_POST["pwd"]) ) {
        if (
            !empty($_POST["mail"]) && 
            !empty($_POST["pwd"]) ) {
              $conuser =  $userC->auth($_POST["mail"],$_POST["pwd"]);
                // header('Location:index.php'); 

                $_SESSION['usermail']=$conuser->mail  ;
                $_SESSION['userid']=$conuser->id  ;
                echo   $_SESSION['usermail']  ;
                 if(isset( $_SESSION['usermail']) &&  $_SESSION['userid']) { if($conuser->role=='lecteur')
                                                            { header('Location:index.php');} 
                                                     if($conuser->role=='auteur')
                                                            { header('Location:ArticleAfficher.php');}
                                                     if($conuser->role=='admin')
                                                            { header('Location:UserAfficher.php');}     } 
              // session_destroy();
             // works :  unset( $_SESSION['usermail']);
     
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
    <title>inscription</title>
</head>
<body>
    <form action="" method="post">
    <label for="mail">mail</label>
    <input type="text" name="mail" id="mail" placeholder="mail">
    <label for="pwd">password</label>
    <input type="text" name="pwd" id="pwd">
    <input type="submit" value="se connecter">
    
</form>
<a href="utilinscription.php">s'inscrire</a>
</body>
</html>

<?php include_once"footer.html"; ?>