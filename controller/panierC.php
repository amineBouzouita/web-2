<?php
include "../config.php";
require "../model/panier.php";

class PanierC{
    
function panierajoute($panier){
    $sql=" INSERT into panier ( idprod,qtty,prix,iduser) 
    values(:idprod , :qtty, :prix, :iduser ) ";
    $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute([
                'idprod'=>$panier->getIdprod(),
                'qtty'=>$panier->getQtty(),
                'prix'=>$panier->getPrix(),
                'iduser'=>$panier->getIduser()

            ]);
        }
        catch(Exception$e){
        echo 'Error: '.$e->getMessage();
        }
}


function adminmodifieproduit($panier,$id){
    $sql="UPDATE panier SET idprod = :idprod , qtty=:qtty , prix= :prix ,iduser= :iduser 
    where id= :id ";
    $db = config::getConnexion();
    try{
        $query=$db->prepare($sql);
        $query->execute([
            'idprod'=>$panier->getTitre(),
            'qtty'=>$panier->getqtty(),
            'prix'=>$panier->getPrix(),
            'iduser'=>$panier->getiduser(),
            'id'=>$id
        ]);
        echo $query->rowCount() ."record updated successfully <br>";
    }
    catch(Exception$e){
    echo 'Error: '.$e->getMessage();
    }
}

function recupereproduit($id){
    $sql="select * from panier where id= :id " ;
    $db = config::getConnexion();
    try{
        $query=$db->prepare($sql);
        $query->execute([
            'id'=>$id 
        ]);
        $user=$query->fetch(PDO::FETCH_OBJ);
        return $user ;
    }
    catch(Exception$e){
        echo 'Error: '.$e->getMessage();
        } 
}

function adminsupprime($id){
    $sql='delete from panier where id= :id '  ;
    $db=config::getConnexion() ;
    try{
        $query=$db->prepare($sql);
        $query->execute([
            'id'=>$id
        ]);
    }
    catch(Exception $e){
        echo 'Eror: '.$e->getMessage();
    }
}

function adminaffiche(){
    $sql='select * from panier ';
    $db=config::getConnexion() ;
    try{
        $liste = $db->query($sql);
        return $liste;
    }
    catch(Exception $e){
        echo 'Eror: '.$e->getMessage();
    }
}
}


?>