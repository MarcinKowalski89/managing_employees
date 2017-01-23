<?php

class Search {

   protected static $instance;

   public static function getInstance() {
       if(self::$instance === null) {
           self::$instance = new Search();
       }
       return self::$instance;
   }
    
    /**
     * Run a search on hierarchy of employees using given filter as criterion
     *
     * @param IFilter $filter to use as search criterion
     * @param Employee $employee being tip of a hierarchy to start searching from
     * @return Employee[]
     */
    public function run(IFilter $filter, Employee $employee) {
        $found = [];
        if ($filter->match($employee)) {
            $found[] = $employee;
        }
        foreach ($employee->getSubordinates() as $subordinate) {
            $found = array_merge($found, (Search::run($filter, $subordinate)));
        }
        return $found;
    }

}