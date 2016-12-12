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
        return $this->manager;
    }

    public function setManager(Employee $manager) {
        $this->manager = $manager->name;        
    }

    public function getSubordinates() {
        return $this->subordinates;
    }

    public function setSubordinates(array $subordinates) {
        $this->subordinates = $subordinates;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getEmploymentDate() {
        return $this->employmentDate;
    }

    public function setEmploymentDate($date) {
        $this->employmentDate = $date;
    }
}