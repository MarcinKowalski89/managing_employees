<?php 

include './classes/Employee.php';
include './classes/Filter.php';

class FilterByNameTest extends PHPUnit_Framework_TestCase {

    public function test_match_result_true() {

        $adam = new Employee('Adam');
        $filter = new FilterByName('Adam');
        
        $expected = TRUE;
        $actual = $filter->match($adam);

        $this->assertEquals($expected, $actual);        
    }

    public function test_match_result_false() {
       
        $adam = new Employee('Adam');
        $filter = new FilterByName('Ola');

        $expected = FALSE;
        $actual = $filter->match($adam);

        $this->assertEquals($expected, $actual);
    }
}

class FilterByStatusTest extends PHPUnit_Framework_TestCase {
   
   public function test_match_result_true() {
      
       $adam = new Employee('Adam');
       $adam->setStatus(Employee::STATUS_ON_DUTY);
      
       $filter = new FilterByStatus(Employee::STATUS_ON_DUTY);

       $expected = TRUE;
       $actual = $filter->match($adam);
       
       $this->assertEquals($expected, $actual);
   }

   public function test_match_result_false() {
       
        $adam = new Employee('Adam');
        $adam->setStatus(Employee::STATUS_ON_DUTY);
       
        $filter = new FilterByStatus(Employee::STATUS_ON_LEAVE);
       
        $expected = FALSE;
        $actual = $filter->match($adam);
       
        $this->assertEquals($expected, $actual);
   } 
}

class FilterByEmploymentDateGreaterThanTest extends PHPUnit_Framework_TestCase {

    public function test_match_result_true() {
       
        $adam = new Employee('Adam');
        $adam->setEmploymentDate(strtotime('01-01-2010'));
       
        $filter = new FilterByEmploymentDateGreaterThan(strtotime('01-01-2009'));

        $expected = TRUE;
        $actual = $filter->match($adam);

        $this->assertEquals($expected, $actual);
    }

    public function test_match_result_false() {
        
        $adam = new Employee('Adam');
        $adam->setEmploymentDate(strtotime('01-01-2010'));

        $filter = new FilterByEmploymentDateGreaterThan(strtotime('01-01-2012'));

        $expected = FALSE;
        $actual = $filter->match($adam);

        $this->assertEquals($expected, $actual);
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

        $expected = TRUE;
        $actual = $filter->match($adam);
        
        $this->assertEquals($expected, $actual);

    }

    public function test_match_result_false() {

        $adam = new Employee('Adam');
        $adam->setStatus(Employee::STATUS_ON_DUTY);
        $adam->setEmploymentDate(strtotime('01-01-2010'));

        $leaveFilter = new FilterByStatus(Employee::STATUS_ON_LEAVE);
        $durationFilter = new FilterByEmploymentDateGreaterThan(strtotime('01-01-2009'));
        $filter = new FilterConjunction([$leaveFilter, $durationFilter]);

        $expected = FALSE;
        $actual = $filter->match($adam);
        
        $this->assertEquals($expected, $actual);

    }
}
