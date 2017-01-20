<?php

include_once './classes/Employee.php';
include_once './classes/Filter.php';
include_once './classes/Search.php';

class SearchTest extends PHPUnit_Framework_TestCase {

    public function test_getInstance_result_instance() {

        $search = Search::getInstance();

        $expected = new Search();

        $this->assertEquals($expected, $search);

    }

    public function test_run_result_array() {

        $search = Search::getInstance();
        $adam = new Employee('Adam');
        $christopheFilter = new FilterByName("Christophe");

        $actual = $search->run($christopheFilter, $adam);

        $this->assertInternalType('array', $actual);
    }

}