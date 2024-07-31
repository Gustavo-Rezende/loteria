<?php

require 'loteria.php';
require 'bilhete.php';

$loteria = new Loteria();
$bilhetesPremiados = $loteria->geraBillhetesPremiados();
echo "Bilhetes Premiados: " . implode(', ', $bilhetesPremiados) . "</br>";

$quantidadeBilhete = 10; 
$quantidadeNumeros = 6; 

try {
    $bilhete = $loteria->geraBilhete($quantidadeBilhete, $quantidadeNumeros);
    foreach ($bilhete as $ticket) {
        echo "Números: " . implode(', ', $ticket) . "</br>";
    }

    echo $loteria->verificaBilhetes($bilhetesPremiados, $bilhete);
} catch (InvalidArgumentException $e) {
    echo $e->getMessage();
}

?>
