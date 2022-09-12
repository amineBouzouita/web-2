<?php
include_once "../config.php";
require "../model/ctg.php";

class CtgC{
    
function ctgajoute($ctg){
    $sql=" INSERT into ctg ( name) 
    values(:name ) ";
    $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute([
                'name'=>$ctg->getName()
                
            ]);
        }
        catch(Exception$e){
        echo 'Error: '.$e->getMessage();
        }
}


function adminmodifiectg($ctg,$id){
    $sql="UPDATE ctg SET name = :name  where id= :id ";
    $db = config::getConnexion();
    try{
        $query=$db->prepare($sql);
        $query->execute([
            'name'=>$ctg->getName(),
          
            'id'=>$id
        ]);
        echo $query->rowCount() ."record updated successfully <br>";
    }
    catch(Exception$e){
    echo 'Error: '.$e->getMessage();
    }
}

function recuperectg($id){
    $sql="select * from ctg where id= :id " ;
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
    $sql='delete from ctg where id= :id '  ;
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
    $sql='select * from ctg ';
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