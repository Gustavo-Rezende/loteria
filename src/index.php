<?php

require 'loteria.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

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
    foreach ($bilhete as $ticket) {
        echo "Números: " . implode(', ', $ticket) . "</br>";
    }

    echo $loteria->verificaBilhetes($bilhetesPremiados, $bilhete);
} catch (InvalidArgumentException $e) {
    echo $e->getMessage();
}

?>
