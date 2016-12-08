<?php

$adam = new Employee('Adam');
$adam->setManager($adam);

$betty = new Employee('Betty');
$betty->setManager($adam);

$christophe = new Employee('Christophe');
$christophe->setManager($betty);

$deirdre = new Employee('Deirdre');
$deirdre->setManager($christophe);

$eoin = new Employee('Eoin');
$eoin->setManager($deirdre);

$fran = new Employee('Fran');
$fran->setManager($eoin);

$ganesha = new Employee('Ganesha');
$ganesha->setManager($fran);

$hugh = new Employee('Hugh');
$hugh->setManager($ganesha);

$ian = new Employee('Ian');
$ian->setManager($hugh);

$jo = new Employee('Jo');
$jo->setManager($ian);

$karolina = new Employee('Karolina');
$karolina->setManager($jo);

$lindsay = new Employee('Lindsay');
$lindsay->setManager($karolina);

$medbh = new Employee('Medbh');
$medbh->setManager($lindsay);

$noliag = new Employee('Noliag');
$noliag->setManager($medbh);

$ola = new Employee('Ola');
$ola->setManager($noliag);

$pepe = new Employee('Pepe');
$pepe->setManager($ola);

$roberto = new Employee('Roberto');
$roberto->setManager($pepe);
