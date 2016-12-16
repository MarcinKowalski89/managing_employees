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
        if($this->name === $employee->getName()) {
            return true;
        }
        return false;
    }
}

class FilterByStatus implements IFilter {
    
    protected $status;

    function __construct($status) {
        $this->status = $status;
    }

    public function match(Employee $employee) {
        if($this->status === $employee->getStatus()) {
            return true;
        }
        return false;
    }
}