<?php

interface IFilter {

    public function match(Employee $employee);

}

class FilterByName implements IFilter {
    
    protected $name;

    function __construct($name) {
        $this->name = $name;
    }

    public function match(Employee $employee) {
        return $this->name === $employee->getName();
    }
}

class FilterByStatus implements IFilter {
    
    protected $status;

    function __construct($status) {
        $this->status = $status;
    }

    public function match(Employee $employee) {
        return $this->status === $employee->getStatus();
    }
}