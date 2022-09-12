


<?php
include_once "../controller/ctgC.php";
include_once '../model/ctg.php';

$user=null ;
$produitC= new ctgC() ;


if( isset($_POST["name"])  ) {
    if (!empty($_POST["name"]) ) {
            $user=new ctg( $_POST["name"]) ;
            $produitC->adminmodifiectg($user,$_GET['id']);
          header('Location:ctg.php'); 
            echo "congrats new ctg modifie".$_POST["name"] ;
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
    <title>Document</title>
</head>
<body>
<form action="" method="post">
    <label for="name">name</label>
    <input type="text" name="name" id="name" placeholder="cgt name">
    
    <input type="submit" value="se connecter">
    
</form>
</body>
</html>

<?php include_once"footer.html"; ?>