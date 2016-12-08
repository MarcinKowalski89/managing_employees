The objective is to write a subsystem for representing and managing
empoyees in a company according to their position in organizational hierarchy, i.e.:

```
                Adam
               /    \
          Betty      Christophe
         /  |  \         |     \
  Deirdre  Eoin Fran  Ganesha   Hugh
 /    |  \                     /    \
Ian  Jo   Karolina      Lindsay      Medbh
                      /  |  |   \
                Noliag  Ola Pepe Roberto
```

In particular the subsystem should:
* represent each employee as an object
* allow obtaining list of direct subordinates and direct managers to each employee
* allow searching for employees from particular point of hierarchy downward
* provide common interface for writing custom search querries

Requirements:
1. Implement search facility as singleton.
2. Implement filters as objects with shared interface.
3. Implement complex search filters using composite pattern.
4. Write at least one unit test using PHPUnit.

Example queries:
* Starting from given employee, find all subordinates by name
* Starting from given employee, find all subordinates currently on leave
* Starting from given employee, find all subordinates with employment shorter than X (configurable as constructor parameter)
* Starting from given employee, find all subordinates with subordinates count greater than X
* Starting from given employee, find all subordinates matching 2 or 3 above criteria in arbitrary order

Preparations:
* Use composer(http://getcomposer.org) to load PHPUnit (see PHPUnit documentation for details)

How to start:

```php
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
```

```php
class Search {

    public static function getInstance() {
        // should return Search singleton
    }
    
    public function run(IFilter $filter, Employe $employee) {
        // should return array of employees matching the filter condition
        // starting from given employee in organizational hierarchy
    }

}
```

```php
interface IFilter {

    public function match(Employee $employee);

}
```

Possible use case:

```php
$adam = ...;

$search = Search::getInstance();
$christopheFilter = new FilterByName("Christophe", $adam);
$christophe = ($search->run($christopheFilter))[0];

$leaveFilter = new FilterByStatus(Employee::STATUS_ON_LEAVE);
$durationFilter = new FilterByEmploymentDateGreaterThan(time() - 365 * 86400); // 1 year
$andFilter = new FilterConjunction([$leaveFilter, $durationFilter]);

$newEmployeeOnLeave = $search->run($andFilter, $christophe);
```

Note: the code is incomplete in significant way. Please update is where needs be
to match the requirements. Feel free to rewrite the code at will.

How to begin:

1. Create project on github.
2. Send us a link. We will keep track and make comments as you commit more code.