<?php
include_once "../controller/utilisateurC.php";
include_once '../model/Utilisateur.php';

$userC= new utilisateurC() ;
$users=$userC->adminaffiche();

if(isset($_POST['rech'])){
    if (!empty($_POST['rech'])){
        $users=$userC->rech($_POST['rech']);
    }
}



if(isset($_POST['select'])){
    if (!empty($_POST['select'])){
        $users=$userC->tri($_POST['select']);
    }
}
?>

<?php include_once"headerback.html";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>afrfichage users</title>
</head>
<body>
<form action="" method="POST">
        <input type="text" id="rech" name="rech">
        <input type="submit" value="rechercher">
    </form>
    <form action=""method="POST">
    <select name="select" id="select">
       
        <option value= "user"> user </option>
        <option value= "organisateur"> organisateur </option>   
        <option value= "admin"> admin </option> 
    </select>
    <input type="submit" value="tri">

        <table border=1 align='center'>
        <tr> 
            <th>id</th>
            <th>mail</th>
            <th>pwd</th>
            <th>role</th>
        </tr>
        <?php foreach($users as $util){   ?>
        <tr>
            <td><?php echo $util['id'] ?></td>
            <td><?php echo $util['mail'] ?></td>
            <td><?php echo $util['pwd'] ?></td>
            <td><?php echo $util['role'] ?></td>
            <td>    <a href=<?PHP echo 'backutilmodifie.php?id='.$util['id'] ?> > Modifier </a></td>
            <td> <a href=<?PHP echo 'utilsupprimer.php?id='.$util['id'] ?> > Supprimer </a></td>
        </tr>
<?php } ;?>
        </table>
</body>
</html>

<?php include_once"footer.html"; ?>