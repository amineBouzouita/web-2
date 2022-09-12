<?php
include "../config.php";
require "../model/utilisateur.php";

class UtilisateurC{
    
function adminajoute($utilisateur){
    $sql=" INSERT into utilisateur ( mail,pwd,role) 
    values(:mail , :pwd, :role ) ";
    $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute([
                'mail'=>$utilisateur->getMail(),
                'pwd'=>$utilisateur->getPwd(),
                'role'=>$utilisateur->getRole()
            ]);
        }
        catch(Exception$e){
        echo 'Error: '.$e->getMessage();
        }
}


function adminmodifieutilisateur($utilisateur,$id){
    $sql="UPDATE utilisateur SET mail = :mail , pwd=:pwd , role= :role where id= :id ";
    $db = config::getConnexion();
    try{
        $query=$db->prepare($sql);
        $query->execute([
            'mail'=>$utilisateur->getMail(),
            'pwd'=>$utilisateur->getPwd(),
            'role'=>$utilisateur->getRole(),
            'id'=>$id
        ]);
        echo $query->rowCount() ."record updated successfully <br>";
    }
    catch(Exception$e){
    echo 'Error: '.$e->getMessage();
    }
}

function recupereutilisateur($id){
    $sql="select * from utilisateur where id= :id " ;
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
    $sql='delete from utilisateur where id= :id '  ;
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
    $sql='select * from utilisateur ';
    $db=config::getConnexion() ;
    try{
        $liste = $db->query($sql);
        return $liste;
    }
    catch(Exception $e){
        echo 'Eror: '.$e->getMessage();
    }
}

function auth($mail,$pwd){
    $sql="select * from utilisateur where mail= :mail and pwd = :pwd";
    $db = config::getConnexion() ;
    try{
        $query=$db->prepare($sql);
        $query->execute([
            'mail'=>$mail,
            'pwd'=>$pwd
        ]);
        if ($query->rowCount() == 1 ){
        $user=$query->fetch(PDO::FETCH_OBJ);
        return $user ;
         }    else { 
            return null ;}
    }
    catch(Exception $e){
        echo 'Eror: '.$e->getMessage();
    }

}

function rech($param){
    $sql='select * from utilisateur where mail= :titre ';
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
        $sql='select * from utilisateur where role = :titre ';
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
}


?>