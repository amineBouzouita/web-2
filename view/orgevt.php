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

<?php include_once"header.html";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>afrfichage evts</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" id="rech" name="rech">
        <input type="submit" value="rechercher">
    </form>
    <form action=""method="POST">
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
            <th>accord</th>
            <th>ctgname</th>
            <th>image</th>
  
           
        </tr>
        <?php foreach($users as $util){   ?>
        <tr>
            <td><?php echo $util['id'] ?></td>
            <td><?php echo $util['titre'] ?></td>
            <td><?php echo $util['description'] ?></td>
            <td><?php  if($util['prix']==0){ echo "non approuve";}
                            else{ echo " approuve"; } ?></td>
            <td><?php echo $util['ctgid'] ?></td>
            <td><img src=<?php echo $util['imgpath'] ?> alt="produit" height="200px" width="200px"></td>
            <td>    <a href=<?PHP echo 'orgmodifie.php?id='.$util['id'] ?> > Modifier </a></td>
            <td> <a href=<?PHP echo 'backprodsup.php?id='.$util['id'] ?> > Supprimer </a></td>
        </tr>
<?php } ;?>
        </table>
        <a href="backproduitajoute.php" position="center">ajouter prod</a>
        <a href="deco.php">se deconnecter</a>
</body>
</html>
<?php include_once"footer.html"; ?>