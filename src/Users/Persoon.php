<?php

namespace vanslambrouckd\Users;


class Persoon {

    protected $naam; //protected = enkel toegankelijk vanuit de class zelf of child class (inheritance)

    public function __construct($naam){
        $this->naam = $naam;
    }

    public function __toString(){
        return $this->name;
    }
}