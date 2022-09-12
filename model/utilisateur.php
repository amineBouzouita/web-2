<?php
class Utilisateur{
    private int $id;
    private string $mail ;
    private  string $pwd ;
    private string $role;

    function __construct(string $mail,string $pwd,string $role){
        $this->mail=$mail;
        $this->pwd=$pwd;
        $this->role=$role;
    }
    function getId():int{
        return $this->id;
    } 
    function getMail():string{
        return $this->mail;
    }
    function getPwd():string{
        return $this->pwd;
    }
    function getRole():string{
        return $this->role;
    }
    function setMail(string $mail):void{
        $this->mail=$mail;
    }
    function setPwd(string $pwd):void{
        $this->pwd=$pwd;
    }
    function setRole(string $role):void{
        $this->role=$role;
    }

}


?>