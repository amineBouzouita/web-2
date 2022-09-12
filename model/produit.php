<?php
class Produit {
 private int $id ;
 private string $titre ; 
 private string $description ;
 private float $prix;
 private string $imgpath ;
 private string $ctgid ;
 function __construct(string $mail,string $pwd,float $role,string $imgpath,string $ctgid){
    $this->titre=$mail;
    $this->description=$pwd;
    $this->prix=$role;
    $this->imgpath=$imgpath ;
    $this->ctgid=$ctgid;
}
function getId():int{
    return $this->id ;
}
function getCtg():string{
    return $this->ctgid ;
}
function getTitre():string{
    return $this->titre ;
}
function getDescription():string{
    return $this->description ;
}
function getPrix():float{
    return $this->prix ;
}
function getImgpath():string{
    return $this->imgpath ;
} 
function setTitre(string $titre){
 $this->titre=$titre;
}
function setDescription(string $titre){
    $this->description=$titre;
   }
function setImgpath(string $titre){
 $this->imgpath=$titre;
}   
function setPrix(float $titre){
    $this->prix=$titre;
}



}


