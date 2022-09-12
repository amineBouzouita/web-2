<?php
include_once "../controller/produitC.php";
include_once '../model/produit.php';
include_once "../controller/ctgC.php" ;
$user=null ;
$userC= new produitC() ;

if( isset($_POST["titre"]) && 
    isset($_POST["description"]) ) {
        echo $_POST["select"]   ;
        if (
            !empty($_POST["titre"]) && 
            !empty($_POST["description"]) ) {
                $user=new produit( $_POST["titre"], $_POST["description"] , $_POST["prix"] , $_POST["imgpath"] , $_POST["select"]  ) ;
                $userC->produitajoute($user);
                // header('Location:index.php'); 
                echo "congrats new prod ajouter";
            }
        else 
            $error = "Missing information";    
    }
$ctgC=new ctgC();
$ctgs=$ctgC->adminaffiche();

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
    <label for="titre">titre</label>
    <input type="text" name="titre" id="titre" placeholder="titre">
    <label for="description">description</label>
    <input type="text" name="description" id="description">
    <label for="prix">prix</label>
    <input type="number" name="prix" id="prix">
    <label for="imgpath">img</label>
    <input type="file" name="imgpath" id="imgpath">
    <label for="select">slect ctg</label>
    <select name="select" id="select">
        <?php foreach ($ctgs as $c){ ?>
        <option value=  <?php echo $c['name'] ?>> <?php echo $c['name'] ?></option>
            <?php } ?>
    </select>
    <input type="submit" value="se connecter">
    
</form>

</body>
</html>

<?php include_once"footer.html"; ?>