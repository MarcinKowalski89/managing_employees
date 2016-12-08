<?php

$adam = new Employee('Adam');
$adam->setManager($adam);
$adam->setStatus(1);

$betty = new Employee('Betty');
$betty->setManager($adam);
$betty->setStatus(1);

$christophe = new Employee('Christophe');
$christophe->setManager($adam);
$christophe->setStatus(1);

$deirdre = new Employee('Deirdre');
$deirdre->setManager($betty);
$deirdre->setStatus(2);

$eoin = new Employee('Eoin');
$eoin->setManager($betty);
$eoin->setStatus(1);

$fran = new Employee('Fran');
$fran->setManager($betty);
$fran->setStatus(3);

$ganesha = new Employee('Ganesha');
$ganesha->setManager($christophe);
$ganesha->setStatus(2);

$hugh = new Employee('Hugh');
$hugh->setManager($christophe);
$hugh->setStatus(1);

$ian = new Employee('Ian');
$ian->setManager($deirdre);
$ian->setStatus(1);

$jo = new Employee('Jo');
$jo->setManager($deirdre);
$jo->setStatus(3);

$karolina = new Employee('Karolina');
$karolina->setManager($deirdre);
$karolina->setStatus(2);

$lindsay = new Employee('Lindsay');
$lindsay->setManager($hugh);
$lindsay->setStatus(1);

$medbh = new Employee('Medbh');
$medbh->setManager($hugh);
$medbh->setStatus(3);

$noliag = new Employee('Noliag');
$noliag->setManager($lindsay);
$noliag->setStatus(1);

$ola = new Employee('Ola');
$ola->setManager($lindsay);
$ola->setStatus(1);

$pepe = new Employee('Pepe');
$pepe->setManager($lindsay);
$pepe->setStatus(1);

$roberto = new Employee('Roberto');
$roberto->setManager($lindsay);
$roberto->setStatus(1);
