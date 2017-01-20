<?php

include_once './classes/Employee.php';

class EmployeeTest extends PHPUnit_Framework_TestCase {

    public function test_getName_result_has_own_name() {

        $adam = new Employee('Adam');

        $expected = 'Adam';
        $actual = $adam->getName();
        
        $this->assertEquals($expected, $actual);
    }

    public function test_getManager_result_has_own_manger() {

        $adam = new Employee('Adam');
        $betty = new Employee('Betty');
        $betty->setManager($adam);

        $expected = 'Adam';
        $actual = $betty->getManager();

        $this->assertEquals($expected, $actual);
    }

    public function test_getSubordinates_result_array() {
        
        $adam = new Employee('Adam');
        $adam->setSubordinates([]);

        $this->assertInternalType('array', $adam->getSubordinates());
    }

    public function test_getSubordinates_result_has_own_subordinates() {

        $adam = new Employee('Adam');
        $betty = new Employee('Betty');
        $christophe = new Employee('Christophe');
        $adam->setSubordinates([$betty, $christophe]);

        $expected = [$betty, $christophe];
        $actual = $adam->getSubordinates();

        $this->assertEquals($expected, $actual);
    }

    public function test_getStatus_result_has_correct_status() {

        $adam = new Employee('Adam');
        $adam->setStatus(Employee::STATUS_ON_DUTY);

        $expected = Employee::STATUS_ON_DUTY;
        $actual = $adam->getStatus();
        
        $this->assertEquals($expected, $actual);
    }
    
    public function test_getEmploymentDate_result_has_correct_employmentDate() {

        $adam = new Employee('Adam');
        $adam->setEmploymentDate(strtotime('01-01-2010'));

        $expected = strtotime('01-01-2010');
        $actual = $adam->getEmploymentDate();
        
        $this->assertEquals($expected, $actual);
    }
}