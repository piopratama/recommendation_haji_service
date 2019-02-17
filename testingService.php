<?php
    require_once("coreClass/myObject.php");
    require_once("myClass/loginProcess.php");
    require_once("myClass/registrasiProcess.php");

    /*$dataUser[0]["name"]="I Wayan Pio Pratama";
    $dataUser[0]["address"]="Br. Kalah, Peliatan, Ubud, Gianyar";
    $dataUser[0]["telp"]="089695846013";
    $dataUser[0]["email"]="piopratama2@gmail.com";
    $dataUser[0]["status"]="single";

    $dataLogin[0]["username"]="pio";
    $dataLogin[0]["password"]=md5("12345");
    $dataLogin[0]["level"]=1;

    $registrasiClass=new registrasiProcess();
    $registrasiClass->insertRegistrasiUser($dataUser, $dataLogin);*/
    $loginObject=new loginProcess();
    $MyObject=$loginObject->checkLogin("admin", "admin", "tb_login");
?>