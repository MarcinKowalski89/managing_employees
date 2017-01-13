<?php

interface IFilter {

    public function match(Employee $employee);

}

class FilterByName implements IFilter {
    
    protected $name;

   public function __construct($name) {
        $this->name = $name;
    }

    public function match(Employee $employee) {
        return $this->name === $employee->getName();
    }
}

class FilterByStatus implements IFilter {
    
    protected $status;

    public function __construct($status) {
        $this->status = $status;
    }

    public function match(Employee $employee) {
        return $this->status === $employee->getStatus();
    }
}

class FilterByEmploymentDateGreaterThan implements IFilter {
    
    protected $employmentDate;

    public function __construct($employmentDate) {
        $this->employmentDate = $employmentDate;
    }

    public function match(Employee $employee) {
        return $this->employmentDate <= $employee->getEmploymentDate();
    }
}

class FilterConjunction implements IFilter {

    protected $filters = [];

    public function __construct(array $filters) {
        $this->filters = $filters;
    }

    public function match(Employee $employee) {
        foreach ($this->filters as $filter) {
            if (!($filter->match($employee))) {
                return false;
            } 
        };
        return true;
    }
}