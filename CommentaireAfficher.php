<?php
include_once "../controller/CommentaireC.php";
include_once '../model/Commentaire.php';

$user=null ;
$userC= new CommentaireC() ;

if( isset($_POST["name"])  ) {
        if (!empty($_POST["name"]) ) {
                $user=new Commentaire( $_POST["name"],$_POST["idArticle"]) ;
                $userC->Commentaireajoute($user);
                // header('Location:index.php'); 
                echo "congrats new commentaire ajouter";
            }
        else 
            $error = "Missing information";    
    }

$commentaires=$userC->adminaffiche();
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
    <label for="name">name</label>
    <input type="text" name="name" id="name" placeholder="commenaire name">
    <label for="idArticle">idArticle</label>
    <input type="text" name="idArticle" id="idArticle" placeholder="idArticle">
    
    <input type="submit" value="se connecter">
    
</form>

<br>

<br>

<br>

<table border=1 align='center'>
        <tr> 
            <th>id</th>
            <th>name</th>
            
        </tr>
        <?php foreach($commentaires as $util){   ?>
        <tr>
            <td><?php echo $util['id'] ?></td>
            <td><?php echo $util['name'] ?></td>
            <td>    <a href=<?PHP echo 'CommentaireModifier.php?id='.$util['id'].'&idArticle='.$util['idArticle'] ?> > Modifier </a></td>
            <td> <a href=<?PHP echo 'CommentaireSupprimer.php?id='.$util['id'] ?> > Supprimer </a></td>
        </tr>
<?php } ;?>
        </table>
</body>
</html>












<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>afrfichage users</title>
</head>
<body>
    

     
</body>
</html>
<?php include_once"footer.html"; ?>