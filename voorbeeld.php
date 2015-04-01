<?php
use vanslambrouckd\Users\Persoon;
use vanslambrouckd\Bedrijf;
use vanslambrouckd\Personeel;


$klaas = new Persoon('Klaas');
$personeel = new Personeel([$klaas]);

$mmates = new Bedrijf($personeel);
$mmates->huur(new Persoon('david'));

//var_dump($mmates);

echo '<pre>';
print_r($mmates);
echo '</pre>';
