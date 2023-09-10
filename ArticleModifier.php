


<?php
include_once "../controller/ArticleC.php";
include_once '../model/Article.php';

$user=null ;
$produitC= new ArticleC() ;


if( isset($_POST["name"])  ) {
    if (!empty($_POST["name"]) ) {
            $user=new Article( $_POST["name"]) ;
            $produitC->adminmodifieArticle($user,$_GET['id']);
          header('Location:ArticleAfficher.php'); 
            echo "congrats new Article modifie".$_POST["name"] ;
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