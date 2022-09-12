<?php
include_once "../controller/produitC.php";
session_start();

if (isset( $_SESSION['userid'])){

    $prodC= new produitC();
    $listprod=$prodC->affichagevt( $_SESSION['userid']);
}
else {
    echo 'usrid notset';
}

?>
<?php include_once"header.html";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1 align='center'>liste participations et favoris</h1>

<table border=1 align='center'>
<tr> 
    <th>id</th>
    <th>titre</th>
    <th>description</th>
    <th>prix</th>
    <th>image</th>
</tr>
<?php foreach($listprod as $p){   ?>
<tr>
    <?php if ($p['prix']!=0){ ?>
    <td><?php echo $p['id'] ?></td>
    <td><?php echo $p['titre'] ?></td>
    <td><?php echo $p['description'] ?></td>
    <td><?php echo $p['prix'] ?></td>
  
    <td><img src=<?php echo $p['imgpath'] ?> alt="produit" height="200px" width="200px"></td>
   
    <?php } ?>
</tr>
<?php } ;?>
</table>
<a href="index.php">home</a>
</tr>
</body>
</html>
<?php include_once"footer.html"; ?>