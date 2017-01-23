<?php

include_once "./classes/Employee.php";
include_once "./classes/Filter.php";
include_once "./classes/Search.php";

/**
 * @coversDefaultClass Search
 */
class SearchTest extends PHPUnit_Framework_TestCase {

	/**
	 * @covers ::__construct
	 * @covers ::getInstance
	 */
    public function test_getInstance_returns_singleton() {
    	$search = Search::getInstance();
    	$this->assertInstanceOf("Search", $search);
    	$this->assertSame($search, Search::getInstance());
    }

    /**
     * @covers run
     */
    public function test_run_returns_resursive_search_results_array() {
    	$filter = $this->getMock("IFilter");
    	$filter->expects($this->exactly(3))
    		->method("match")
    		->will($this->returnValue(true));

        $adam = new Employee("Adam");
        $betty = new Employee("Betty");
        $christophe = new Employee("Christophe");
		$adam->setSubordinates([$betty, $christophe]);

        $search = Search::getInstance();
        $expected = [$adam, $betty, $christophe];
        $actual = $search->run($filter, $adam);

        $this->assertEquals($expected, $actual);
    }

}