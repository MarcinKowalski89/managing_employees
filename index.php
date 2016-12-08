<?php

include 'input.php';
include 'classes/Employee.php';
include 'classes/Filter.php';
include 'classes/Search.php';

$adam = new Employee('Adam');
$adam->setManager($adam);
var_dump($adam->getManager());

$betty = new Employee('Betty');
$betty->setManager($adam);
var_dump($betty->getManager());

$christophe = new Employee('Christophe');
$christophe->setManager($betty);
var_dump($christophe->getManager());

$deirdre = new Employee('Deirdre');
$deirdre->setManager($christophe);
var_dump($deirdre->getManager());

$eoin = new Employee('Eoin');
$eoin->setManager($deirdre);
var_dump($eoin->getManager());

$fran = new Employee('Fran');
$fran->setManager($eoin);
var_dump($fran->getManager());

$ganesha = new Employee('Ganesha');
$ganesha->setManager($fran);
var_dump($ganesha->getManager());

$hugh = new Employee('Hugh');
$hugh->setManager($ganesha);
var_dump($hugh->getManager());

$ian = new Employee('Ian');
$ian->setManager($hugh);
var_dump($ian->getManager());

$jo = new Employee('Jo');
$jo->setManager($ian);
var_dump($jo->getManager());

$karolina = new Employee('Karolina');
$karolina->setManager($jo);
var_dump($karolina->getManager());

$lindsay = new Employee('Lindsay');
$lindsay->setManager($karolina);
var_dump($lindsay->getManager());

$medbh = new Employee('Medbh');
$medbh->setManager($lindsay);
var_dump($medbh->getManager());

$noliag = new Employee('Noliag');
$noliag->setManager($medbh);
var_dump($noliag->getManager());

$ola = new Employee('Ola');
$ola->setManager($noliag);
var_dump($ola->getManager());

$pepe = new Employee('Pepe');
$pepe->setManager($ola);
var_dump($pepe->getManager());

$roberto = new Employee('Roberto');
$roberto->setManager($pepe);
var_dump($roberto->getManager());
