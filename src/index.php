<?php

require 'loteria.php';

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['error' => 'Requisição Inválida']);
    die;
}

if (empty($data['quantidade_bilhetes']) && empty($data['quantidade_bilhetes'])) {
    echo json_encode(['error' => 'Parâmetros Inválidos']);
    die;
}

$quantidadeBilhete = $data['quantidade_bilhetes']; 
$quantidadeDezenas = $data['quantidade_dezenas']; 

$loteria = new Loteria();
$bilhetesPremiados = $loteria->geraBillhetePremiado();
echo "Bilhete Premiado: " . implode(', ', $bilhetesPremiados) . "</br>";

try {
    $bilhete = $loteria->geraBilhete($quantidadeBilhete, $quantidadeDezenas);
    echo $loteria->verificaBilhetes($bilhetesPremiados, $bilhete);
} catch (InvalidArgumentException $e) {
    echo $e->getMessage();
}

?>
