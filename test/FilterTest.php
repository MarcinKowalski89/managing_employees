<?php

include './classes/Employee.php';
include './classes/Filter.php';

class FilterByNameTest extends PHPUnit_Framework_TestCase {

    public function test_match_result_true() {
        $adam = new Employee('Adam');
        $filter = new FilterByName('Adam');
        $this->assertTrue($filter->match($adam));
    }

    public function test_match_result_false() {
        $adam = new Employee('Adam');
        $filter = new FilterByName('Ola');
        $this->assertFalse($filter->match($adam));
    }

}

class FilterByStatusTest extends PHPUnit_Framework_TestCase {

    public function test_match_result_true() {
        $adam = new Employee('Adam');
        $adam->setStatus(Employee::STATUS_ON_DUTY);
        $filter = new FilterByStatus(Employee::STATUS_ON_DUTY);
        $this->assertTrue($filter->match($adam));
    }

   public function test_match_result_false() {
        $adam = new Employee('Adam');
        $adam->setStatus(Employee::STATUS_ON_DUTY);
        $filter = new FilterByStatus(Employee::STATUS_ON_LEAVE);
        $this->assertFalse($filter->match($adam));
    }

}

class FilterByEmploymentDateGreaterThanTest extends PHPUnit_Framework_TestCase {

    public function test_match_result_true() {
        $adam = new Employee('Adam');
        $adam->setEmploymentDate(strtotime('01-01-2010'));
        $filter = new FilterByEmploymentDateGreaterThan(strtotime('01-01-2009'));
        $this->assertTrue($filter->match($adam));
    }

    public function test_match_result_false() {
        $adam = new Employee('Adam');
        $adam->setEmploymentDate(strtotime('01-01-2010'));
        $filter = new FilterByEmploymentDateGreaterThan(strtotime('01-01-2012'));
        $this->assertFalse($filter->match($adam));
    }

}

class FilterConjunctionTest extends PHPUnit_Framework_TestCase {

    public function test_match_result_true() {
        $adam = new Employee('Adam');
        $adam->setStatus(Employee::STATUS_ON_DUTY);
        $adam->setEmploymentDate(strtotime('01-01-2010'));

        $leaveFilter = new FilterByStatus(Employee::STATUS_ON_DUTY);
        $durationFilter = new FilterByEmploymentDateGreaterThan(strtotime('01-01-2009'));
        $filter = new FilterConjunction([$leaveFilter, $durationFilter]);
        $this->assertTrue($filter->match($adam));
    }

    public function test_match_result_false() {
        $adam = new Employee('Adam');
        $adam->setStatus(Employee::STATUS_ON_DUTY);
        $adam->setEmploymentDate(strtotime('01-01-2010'));
        $leaveFilter = new FilterByStatus(Employee::STATUS_ON_LEAVE);
        $durationFilter = new FilterByEmploymentDateGreaterThan(strtotime('01-01-2009'));

        // first filter fails, second passes
        $filter = new FilterConjunction([$leaveFilter, $durationFilter]);
        $this->assertFalse($filter->match($adam));

        // first filter passes, second fails
        $filter = new FilterConjunction([$durationFilter, $leaveFilter]);
        $this->assertFalse($filter->match($adam));
    }

}