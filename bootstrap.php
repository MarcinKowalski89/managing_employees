<?php

$adam = new Employee('Adam');
$betty = new Employee('Betty');
$christophe = new Employee('Christophe');
$deirdre = new Employee('Deirdre');
$eoin = new Employee('Eoin');
$fran = new Employee('Fran');
$ganesha = new Employee('Ganesha');
$hugh = new Employee('Hugh');
$ian = new Employee('Ian');
$jo = new Employee('Jo');
$karolina = new Employee('Karolina');
$lindsay = new Employee('Lindsay');
$medbh = new Employee('Medbh');
$noliag = new Employee('Noliag');
$ola = new Employee('Ola');
$pepe = new Employee('Pepe');
$roberto = new Employee('Roberto');

$adam->setManager($adam);
$betty->setManager($adam);
$christophe->setManager($adam);
$deirdre->setManager($betty);
$eoin->setManager($betty);
$fran->setManager($betty);
$ganesha->setManager($christophe);
$hugh->setManager($christophe);
$ian->setManager($deirdre);
$jo->setManager($deirdre);
$karolina->setManager($deirdre);
$lindsay->setManager($hugh);
$medbh->setManager($hugh);
$noliag->setManager($lindsay);
$ola->setManager($lindsay);
$pepe->setManager($lindsay);
$roberto->setManager($lindsay);

$adam->setStatus(Employee::STATUS_ON_DUTY);
$betty->setStatus(Employee::STATUS_ON_DUTY);
$christophe->setStatus(Employee::STATUS_ON_DUTY);
$deirdre->setStatus(Employee::STATUS_DISMISSED);
$eoin->setStatus(Employee::STATUS_ON_DUTY);
$fran->setStatus(Employee::STATUS_ON_LEAVE);
$ganesha->setStatus(Employee::STATUS_DISMISSED);
$hugh->setStatus(Employee::STATUS_ON_DUTY);
$ian->setStatus(Employee::STATUS_ON_DUTY);
$jo->setStatus(Employee::STATUS_ON_LEAVE);
$karolina->setStatus(Employee::STATUS_DISMISSED);
$lindsay->setStatus(Employee::STATUS_ON_DUTY);
$medbh->setStatus(Employee::STATUS_ON_LEAVE);
$noliag->setStatus(Employee::STATUS_ON_DUTY);
$ola->setStatus(Employee::STATUS_ON_DUTY);
$pepe->setStatus(Employee::STATUS_ON_DUTY);
$roberto->setStatus(Employee::STATUS_ON_DUTY);

$adam->setSubordinates([$betty, $christophe]);
$betty->setSubordinates([$deirdre, $eoin, $fran]);
$christophe->setSubordinates([$ganesha, $hugh]);
$deirdre->setSubordinates([$ian, $jo, $karolina]);
$hugh->setSubordinates([$lindsay, $medbh]);
$lindsay->setSubordinates([$noliag, $ola, $pepe, $roberto]);

$adam->setEmploymentDate(strtotime('01-01-2010'));
$betty->setEmploymentDate(strtotime('01-02-2010'));
$christophe->setEmploymentDate(strtotime('01-02-2010'));
$deirdre->setEmploymentDate(strtotime('19-04-2010'));
$eoin->setEmploymentDate(strtotime('20-09-2010'));
$fran->setEmploymentDate(strtotime('25-02-2014'));
$ganesha->setEmploymentDate(strtotime('17-05-2015'));
$hugh->setEmploymentDate(strtotime('13-03-2013'));
$ian->setEmploymentDate(strtotime('22-07-2015'));
$jo->setEmploymentDate(strtotime('30-06-2016'));
$karolina->setEmploymentDate(strtotime('11-10-2012'));
$lindsay->setEmploymentDate(strtotime('07-08-2011'));
$medbh->setEmploymentDate(strtotime('31-12-2012'));
$noliag->setEmploymentDate(strtotime('11-06-2012'));
$ola->setEmploymentDate(strtotime('14-02-2011'));
$pepe->setEmploymentDate(strtotime('08-06-2016'));
$roberto->setEmploymentDate(strtotime('12-12-2015'));

$search = Search::getInstance();
$christopheFilter = new FilterByName("Christophe");
$chris = ($search->run($christopheFilter, $adam))[0];
// var_dump($chris);

// $leaveFilter = new FilterByStatus(Employee::STATUS_ON_DUTY);
$leaveFilter = new FilterByStatus(Employee::STATUS_DISMISSED);
$adamStatus = $leaveFilter->match($adam);
// var_dump($adamStatus);

$durationFilter = new FilterByEmploymentDateGreaterThan(strtotime('01-01-2009'));
$result = $durationFilter->match($adam);
// var_dump($result);

$andFilter = new FilterConjunction([$leaveFilter, $durationFilter]);
$adamsfilter = $andFilter->match($adam);
// var_dump($adamsfilter);

$abc = $search->run($leaveFilter, $adam);
foreach ($abc as $data) {
   echo $data->getName();
   echo $data->getStatus();
};
