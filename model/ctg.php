<?php

class ctg {
private int $id ;
private string $name ;

function __construct(string $name){
    $this->name = $name ;
}
function getId():int{
    return $this->id;
}
function getName():string{
    return $this->name;
}
function setName(string $name){
    $this->name=$name;
}
}