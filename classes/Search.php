<?php

class Search {

    public static function getInstance() {
        // should return Search singleton
    }
    
    public function run(IFilter $filter, Employe $employee) {
        // should return array of employees matching the filter condition
        // starting from given employee in organizational hierarchy
    }

}