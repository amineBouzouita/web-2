<?php
include_once "../controller/ArticleC.php";
include_once '../model/Article.php';

$user=null ;
$userC= new ArticleC() ;

if( isset($_POST["name"])  ) {
        if (!empty($_POST["name"]) ) {
                $user=new Article( $_POST["name"]) ;
                $userC->Articleajoute($user);
                // header('Location:index.php'); 
                echo "congrats new Article ajouter";
            }
        else 
            $error = "Missing information";    
    }

$Articles=$userC->adminaffiche();
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
    <input type="text" name="name" id="name" placeholder="cgt name">
    
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
        <?php foreach($Articles as $util){   ?>
        <tr>
            <td><?php echo $util['id'] ?></td>
            <td><?php echo $util['name'] ?></td>
            <td>    <a href=<?PHP echo 'Articlemodifier.php?id='.$util['id'] ?> > Modifier </a></td>
            <td> <a href=<?PHP echo 'Articlesupprimer.php?id='.$util['id'] ?> > Supprimer </a></td>
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