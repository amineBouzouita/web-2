<?php

include_once "../controller/produitC.php" ;
$prodC =new produitC() ;

$listprod=$prodC->tri("a")
 

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
    <?php  foreach ($listprod as $p){  
        echo $p['titre'];
    }  ?>

</body>
</html>

<?php include_once"footer.html"; ?>