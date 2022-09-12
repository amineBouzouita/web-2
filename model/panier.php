<?php
class Panier {
 private int $id ;
 private int $idprod ; 
 private int $qtty ;
 private float $prix;
 private int $iduser ;
 function __construct(int $idprod ,int $qtty ,float $prix , int $iduser){
    $this->idprod=$idprod;
    $this->qtty=$qtty;
    $this->prix=$prix ;
    $this->iduser=$iduser;

}
function getId():int{
    return $this->id ;
}

function getIdprod():int{
    return $this->idprod ;
}
function getQtty():int{
    return $this->qtty ;
}
function getPrix():float{
    return $this->prix ;
}
function getIduser():int{
    return $this->iduser ;
} 
function setIdprod(int $titre){
 $this->idprod=$titre;
}
function setQtty(int $titre){
    $this->qtty=$titre;
   }
function setIduser(int $titre){
 $this->iduser=$titre;
}   
function setPrix(float $titre){
    $this->prix=$titre;
}



}


