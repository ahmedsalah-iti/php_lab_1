<?php
$validCap = ["SqwW47s","R4sQ4d","Qsx4a","AS45s","5As1","WF54xa"];
function isValidCap($cap){
    global $validCap;
    if(in_array($cap,$validCap)){
        return TRUE;
    }else{
        return FALSE;
    }
}
function getCap(){
    global $validCap;
    return $validCap[rand(0,count($validCap)-1)];
}
?>