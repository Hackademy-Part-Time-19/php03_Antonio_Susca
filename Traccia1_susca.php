<?php

class Company{

    public $name;
    public $location;
    public $tot_employees;
    static public $tot_wages_comp=0;

    public function report(){
        if ($this->tot_employees == 0){
            echo "L'ufficio $this->name con sede in $this->location non ha dipendenti" . "\n";
        }else {
            echo "L'ufficio $this->name con sede in $this->location ed ha ben $this->tot_employees" . "\n";
        }

    }

    static public $avg_wage = 1500;



    public function __construct($_name,$_location,$_tot_employees){

        $this->name = $_name;
        $this->location = $_location;
        $this->tot_employees = $_tot_employees;
        self::$tot_wages_comp+=($this->tot_employees*Company::$avg_wage);

    }

    public function totWage($months = 12){
        $avg = Company :: $avg_wage * $months * $this->tot_employees;
        echo  "L'azienda ha speso $avg \n";



    }

}

$company1 = new Company("Aulab", "Italia",50);
$company2 = new Company("Amex", "Usa" , 25000);
$company3 = new Company("Pirelli", "Italia",0);
$company4 = new Company("Apple", "USA" , 35000);
$company5 = new Company("Google" , "Francia", 0);


$companies = [$company1, $company2, $company3, $company4, $company5];

foreach ($companies as $company){
    $company-> report();
    $company-> totWage();
}

$month=(readline('inserisci mensilità: '));
$company1->totWage($month);
echo "Le aziende hanno speso in totale: ".Company::$tot_wages_comp."\n";