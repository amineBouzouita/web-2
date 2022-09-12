

<?php include_once"header.html";?>
<?php
include_once "../controller/produitC.php";
include_once '../model/produit.php';
include_once "../controller/ctgC.php" ;
$user=null ;
$produitC= new produitC() ;

if( isset($_POST["titre"]) && 
    isset($_POST["description"]) ) {
        echo $_POST["select"]   ;
        if (
            !empty($_POST["titre"]) && 
            !empty($_POST["description"]) ) {
                $user=new produit( $_POST["titre"], $_POST["description"] , $_POST["accord"] , $_POST["imgpath"] , $_POST["select"]  ) ;
                $produitC->adminmodifieproduit($user,$_GET['id']);
                // header('Location:index.php'); 
                echo 'approuve:  '. $_POST["accord"] .'<br>' ;
                echo "congrats new prod modified";
            }
        else 
            $error = "Missing information";    
    }
$ctgC=new ctgC();
$ctgs=$ctgC->adminaffiche();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>backmodifie evt</title>
</head>
<body>
<?php
if (isset($_GET['id']) && !empty($_GET['id'])){

$prod= $produitC->recupereproduit($_GET['id']);
  

?>
    <form action="" method="post">
    <label for="titre">titre</label>
    <input type="text" name="titre" id="titre" placeholder="titre" value=<?php echo $prod->titre ?>  >
    <label for="description">description</label>
    <input type="text" name="description" id="description" value=<?php echo $prod->description ?> >
    <label for="accord">accord</label>
   <input type="hidden" name="accord" value= <?php echo $prod->prix ?>  > 
    <label for="imgpath">img</label>
    <input type="file" name="imgpath" id="imgpath" value=<?php echo $prod->imgpath ?>>
    <label for="select">slect ctg</label>
    <select name="select" id="select" >
        <?php foreach ($ctgs as $c){ ?>
        <option value=  <?php echo $c['name'] ?>> <?php echo $c['name'] ?></option>
            <?php } ?>
    </select>
    <input type="submit" value="se connecter">
    
</form>
<?php }

else{ echo "id not set ";} ?>
</body>
</html>

<?php include_once"footer.html"; ?>