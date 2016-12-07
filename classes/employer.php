<?php

class Employee {
    
    const STATUS_ON_DUTY = 1;
    const STATUS_DISMISSED = 2;
    const STATUS_ON_LEAVE = 3;

    protected $name;
    protected $manager;
    protected $subordinates = [];
    protected $status = self::STATUS_ON_DUTY;
    protected $employmentDate;

    public function __construct($name) {
        $this->name = $name;
    }

    public function getManager() {
        // obvious
    }

    public function setManager(Employee $manager) {
        // should set the manager and return self
    }

    public function getSubordinates() {
        // should return array of direct subordinates
    }

}