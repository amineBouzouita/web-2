<?php
include_once "../controller/panierC.php";
include_once '../model/panier.php';
include_once "../controller/produitC.php";
session_start();

if ( isset($_SESSION['usermail'])){
  //  echo' <br> <a href="deco.php">se deconnecter</a> ' ; 
$user=null ;
$userC= new panierC() ;

if( isset($_POST["idprod"]) && 
    isset($_POST["iduser"]) ) {
        echo $_POST["idprod"]. $_POST["fav"] . $_POST["prix"] . $_POST["iduser"]  ;
        
        if (
            !empty($_POST["idprod"]) && 
            !empty($_POST["iduser"]) && 
            !empty($_POST["fav"])) {
                $user=new panier( $_POST["idprod"], $_POST["fav"] , $_POST["prix"] , $_POST["iduser"] ) ;
                $userC->panierajoute($user);
                // header('Location:index.php'); 
                echo "congrats new panier ajouter";
            }
        else 
            $error = "Missing information";    
    }
?>
<?php
include_once "../controller/produitC.php";
include_once "../controller/ctgC.php"; 

$userC= new ProduitC() ;
$users=$userC->adminaffiche();
if(isset($_POST['rech'])){
    if (!empty($_POST['rech'])){
        $users=$userC->rech($_POST['rech']);
    }
}

$ctgC=new ctgC();
$ctgs=$ctgC->adminaffiche();

if(isset($_POST['select'])){
    if (!empty($_POST['select'])){
        $users=$userC->tri($_POST['select']);
    }
}
?>







<?php


$userC= new ProduitC() ;
$prods=$userC->adminaffiche();
?>

<?php include_once"header.html";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home (index) </title>
</head>
<body>
    <h1 align="center"> HOME </h1>

    <form action="" method="POST" align="center">
        <input type="text" id="rech" name="rech">
        <input type="submit" value="rechercher">
    </form>
    <form action=""method="POST" align="center">
    <select name="select" id="select">
        <?php foreach ($ctgs as $c){ ?>
        <option value=  <?php echo $c['name'] ?>> <?php echo $c['name'] ?></option>
            <?php } ?>
    </select>
    <input type="submit" value="tri">

    </form> 

        <table border=1 align='center'>
        <tr> 
            <th>id</th>
            <th>titre</th>
            <th>description</th>
            <th>prix</th>
            <th>image</th>
        </tr>
        <?php foreach($users as $p){   ?>
        <tr>
            <?php if ($p['prix']!=0){ ?>
            <td><?php echo $p['id'] ?></td>
            <td><?php echo $p['titre'] ?></td>
            <td><?php echo $p['description'] ?></td>
            <td><?php echo $p['prix'] ?></td>
          
            <td><img src=<?php echo $p['imgpath'] ?> alt="produit" height="200px" width="200px"></td>
            <td>
            <form action="" method="post">
    <input type="hidden" name="idprod" id="idprod" value=<?php echo intval($p['id']) ?> >
    <label for="fav">fav</label>
    <input type="checkbox" name="fav" id="fav" value="1"> 
    <input type="hidden" name="prix" id="prix" value=<?php echo intval($p['id']) ?> >
    <input type="hidden" name="iduser" id="iduser" value=<?php echo $_SESSION['userid'] ?>  >

    <input type="submit" value="y participer">
    
</form>
            </td>
            <?php } ?>
        </tr>
<?php } ;?>
        </table>
        <a href=<?PHP echo 'userevt.php?usrid='.$_SESSION['userid'] ?> > aller a mes evenements </a></td>
        </tr>
</body>
</html>

                
<?php

        }
        else { echo 'u need to connect'; 
            header('Location:utilauth.php');  }
?>