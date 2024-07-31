<?php

class Loteria
{
    public function geraBillhetesPremiados($qtdLimite = null)
    {
        $numeros = range(1, 60);
        shuffle($numeros);
        if ($qtdLimite == null) {
            $qtdLimite = 6;
        }
        $bilhete = array_slice($numeros, 0, $qtdLimite);
        sort($bilhete);
        return $bilhete;
    }

    public function geraBilhete($quantidadeBilhetes, $quantidadeDezenas)
    {
        if ($quantidadeBilhetes < 1 || $quantidadeBilhetes > 50) {
            throw new InvalidArgumentException('Quantidade de bilhetes deve ser entre 1 e 50.');
        }

        if ($quantidadeDezenas < 6 || $quantidadeDezenas > 10) {
            throw new InvalidArgumentException('A quantidade de dezenas deve estar entre 6 e 10');
        }

        $bilhetes = [];
        for ($i = 0; $i < $quantidadeBilhetes; $i++) {            
            $ticket = $this->geraBillhetesPremiados($quantidadeDezenas);
            $bilhetes[] = $ticket;
        }

        return $bilhetes;
    }

    public function verificaBilhetes($bilhetesPremiados, $bilhetes)
    {
        $resultado = "<table border='1'><tr><th>Ticket</th><th>Matching Numbers</th></tr>";
        foreach ($bilhetes as $bilhete) {
            $partidas = array_intersect($bilhetesPremiados, $bilhete);
            $resultado .= "<tr><td>" . implode(', ', $bilhete) . "</td><td>" . implode(', ', $partidas) . "</td></tr>";
        }
        $resultado .= "</table>";
        return $resultado;
    }
}
?>
