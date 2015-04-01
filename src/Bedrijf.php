<?php

namespace vanslambrouckd;
use vanslambrouckd\Users\Persoon;


class Bedrijf {

    protected $personeel;

    public function __construct(Personeel $personeel) { //typehinting
        $this->personeel = $personeel;
    }

    public function huur(Persoon $persoon){
        $this->personeel->toevoegen($persoon);
    }
} 