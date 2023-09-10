<?php
include_once "../controller/ArticleC.php";
include_once '../model/Article.php';

session_start();

if ( isset($_SESSION['usermail'])){
$user=null ;
$userC= new ArticleC() ;


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
           
        </tr>
<?php } ;?>
        </table>
        <a href="forum.php">forum de commentaire</a>
        
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

<?php

        }
        else { echo 'u need to connect'; 
            header('Location:UserAuth.php');  }
?>