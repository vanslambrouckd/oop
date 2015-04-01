<?php

namespace vanslambrouckd;

use vanslambrouckd\Users\Persoon;

class Personeel {

    protected $personen = [];

    public function __construct($personen = [])
    {
        $this->personen = $personen;
    }

    public function toevoegen(Persoon $persoon){
        $this->personen[] = $persoon;
    }


    public function personen()
    {
        //getter functie
        return $this->personen;
    }
} 