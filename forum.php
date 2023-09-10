<?php
include_once "../controller/CommentaireC.php";
include_once '../model/Commentaire.php';

$commentaire=null ;
$commentaireC= new CommentaireC() ;

if( isset($_POST["name"])  ) {
        if (!empty($_POST["name"]) ) {
                $commentaire=new Commentaire( $_POST["name"],$_POST["idArticle"]) ;
                $commentaireC->Commentaireajoute($commentaire);
                // header('Location:index.php'); 
                echo "congrats new commentaire ajouter";
            }
        else 
            $error = "Missing information";    
    }

$commentaires=$commentaireC->adminaffiche();
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
    
    <input type="submit" value="ajouter">
    
</form>

<br>

<br>

<br>

<table border=1 align='center'>
        <tr> 
            <th>id commentaire</th>
            <th>name</th>
            <th>idArticle</th>
            
        </tr>
        <?php foreach($commentaires as $com){   ?>
        <tr>
            <td><?php echo $com['id'] ?></td>
            <td><?php echo $com['name'] ?></td>
            <td><?php echo $com['idArticle'] ?></td>
             </tr>
<?php } ;?>
        </table>
        <a href="index.php">liste d articles</a>
</body>
</html>












<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>afrfichage commentaires</title>
</head>
<body>
    

     
</body>
</html>
<?php include_once"footer.html"; ?>