<?php

class Search {

   protected static $instance;

   public static function getInstance() {
       if(self::$instance === null) {
           self::$instance = new Search();
       }
       return self::$instance;
   }
    
    public function run(IFilter $filter, Employe $employee) {
        // should return array of employees matching the filter condition
        // starting from given employee in organizational hierarchy       
    }

}