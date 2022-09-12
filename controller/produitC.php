<?php
 include_once "../config.php";
require "../model/produit.php";

class ProduitC{
    
function produitajoute($produit){
    $sql=" INSERT into produit ( titre,description,prix,imgpath,ctgid) 
    values(:titre , :description, :prix, :imgpath , :ctg) ";
    $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute([
                'titre'=>$produit->getTitre(),
                'description'=>$produit->getDescription(),
                'prix'=>$produit->getPrix(),
                'imgpath'=>$produit->getImgpath(),
                'ctg'=>$produit->getCtg()

            ]);
        }
        catch(Exception$e){
        echo 'Error: '.$e->getMessage();
        }
}


function adminmodifieproduit($produit,$id){
    $sql="UPDATE produit SET titre = :titre , description=:description , prix= :prix ,imgpath= :imgpath 
    where id= :id ";
    $db = config::getConnexion();
    try{
        $query=$db->prepare($sql);
        $query->execute([
            'titre'=>$produit->getTitre(),
            'description'=>$produit->getDescription(),
            'prix'=>$produit->getPrix(),
            'imgpath'=>$produit->getImgpath(),
            'id'=>$id
        ]);
        echo $query->rowCount() ."record updated successfully <br>";
    }
    catch(Exception$e){
    echo 'Error: '.$e->getMessage();
    }
}

function recupereproduit($id){
    $sql="select * from produit where id= :id " ;
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
    $sql='delete from produit where id= :id '  ;
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
    $sql='select * from produit ';
    $db=config::getConnexion() ;
    try{
        $liste = $db->query($sql);
        return $liste;
    }
    catch(Exception $e){
        echo 'Eror: '.$e->getMessage();
    }
}
function rech($param){
    $sql='select * from produit where titre= :titre ';
    $db=config::getConnexion() ;
  
    try{
        $query=$db->prepare($sql);
        $query->execute([
            'titre'=>$param 
        ]);
        $user=$query->fetchAll();
       
        return $user ;
        
    }
    catch(Exception $e){
        echo 'Eror: '.$e->getMessage();
    }
}
    function tri($param){
        $sql='select * from produit where ctgid= :titre ';
        $db=config::getConnexion() ;
        try{
            $query=$db->prepare($sql);
            $query->execute([
                'titre'=>$param 
            ]);
            $user=$query->fetchAll();
            return $user ;  
        }
        catch(Exception $e){
            echo 'Eror: '.$e->getMessage();
        }
}
    function affichagevt($usrid){
        $sql='select * from produit where id in (select idprod from panier where iduser= :id) ';
        $db=config::getConnexion() ;
        try{
            $query=$db->prepare($sql);
            $query->execute([
                'id'=>$usrid 
            ]);
            $evt=$query->fetchAll();
            return $evt ;  
        }
        catch(Exception $e){
            echo 'Eror: '.$e->getMessage();
        }

    }
}


?>