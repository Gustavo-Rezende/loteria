<?php

use PHPUnit\Framework\TestCase;
use App\Loteria;


class LoteriaTest extends TestCase
{   
    protected $loteria;

    protected function setUp(): void
    {
        parent::setUp();
        $this->loteria = new Loteria();
    }
   
    
    public function testGeraBilhetesAleatoriosQuantidade()
    {
        $qtdLimite = 6;
        $bilhete = $this->loteria->geraBillhetesAleatorios($qtdLimite);

        $this->assertIsArray($bilhete, "O resultado deve ser um array.");
        $this->assertCount($qtdLimite, $bilhete, "O array deve conter exatamente $qtdLimite números.");
    }

    
    public function testGeraBilhetesAleatoriosNumeros()
    {
        $qtdLimite = 6;
        $bilhete = $this->loteria->geraBillhetesAleatorios($qtdLimite);

        foreach ($bilhete as $numero) {
            $this->assertGreaterThanOrEqual(1, $numero, "O número $numero deve ser maior ou igual a 1.");
            $this->assertLessThanOrEqual(60, $numero, "O número $numero deve ser menor ou igual a 60.");
        }
    }

    
    public function testGeraBilhetesAleatoriosOrdem()
    {
        $qtdLimite = 6;
        $bilhete = $this->loteria->geraBillhetesAleatorios($qtdLimite);

        $this->assertEquals($bilhete, array_unique($bilhete), "Os números devem ser únicos.");
        $this->assertSame($bilhete, array_values(array_unique($bilhete)), "Os números devem ser únicos.");
        $this->assertEquals($bilhete, array_values($bilhete), "Os números devem estar em ordem crescente.");
    }

    public function testGeraBillhetePremiadoQuantidade()
    {
        $bilhete = $this->loteria->geraBillhetePremiado();
        
        $this->assertIsArray($bilhete, "O resultado deve ser um array.");
        $this->assertCount(6, $bilhete, "O bilhete deve conter exatamente 6 números.");
    }

    public function testGeraBillhetePremiadoNumeros()
    {
        $bilhete = $this->loteria->geraBillhetePremiado();
        
        foreach ($bilhete as $numero) {
            $this->assertGreaterThanOrEqual(1, $numero, "O número $numero deve ser maior ou igual a 1.");
            $this->assertLessThanOrEqual(60, $numero, "O número $numero deve ser menor ou igual a 60.");
        }
    }

    public function testGeraBillhetePremiadoOrdem()
    {
        $bilhete = $this->loteria->geraBillhetePremiado();
        
        $this->assertEquals($bilhete, array_unique($bilhete), "Os números devem ser únicos.");
        $this->assertSame($bilhete, array_values(array_unique($bilhete)), "Os números devem ser únicos.");
        $this->assertTrue($this->isSorted($bilhete), "Os números devem estar em ordem crescente.");
    }

    private function isSorted(array $array): bool
    {
        $sortedArray = $array;
        sort($sortedArray);
        return $array === $sortedArray;
    }

    public function testGeraBilheteQuantidadeValida()
    {
        $quantidadeBilhetes = 5;
        $quantidadeDezenas = 7;

        $bilhetes = $this->loteria->geraBilhete($quantidadeBilhetes, $quantidadeDezenas);

        $this->assertIsArray($bilhetes, "O resultado deve ser um array.");
        $this->assertCount($quantidadeBilhetes, $bilhetes, "O número de bilhetes gerados deve ser igual a quantidadeBilhetes.");

        foreach ($bilhetes as $bilhete) {
            $this->assertIsArray($bilhete, "Cada bilhete deve ser um array.");
            $this->assertCount($quantidadeDezenas, $bilhete, "Cada bilhete deve conter exatamente $quantidadeDezenas dezenas.");
            foreach ($bilhete as $numero) {
                $this->assertGreaterThanOrEqual(1, $numero, "O número $numero deve ser maior ou igual a 1.");
                $this->assertLessThanOrEqual(60, $numero, "O número $numero deve ser menor ou igual a 60.");
            }
        }
    }

    public function testGeraBilheteQuantidadeBilhetesInvalida()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Quantidade de bilhetes deve ser entre 1 e 50.');

        $this->loteria->geraBilhete(0, 6);
    }

    public function testGeraBilheteQuantidadeDezenasInvalida()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('A quantidade de dezenas deve estar entre 6 e 10');

        $this->loteria->geraBilhete(5, 5);
    }

    public function testGeraBilheteQuantidadeDezenasExcedida()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('A quantidade de dezenas deve estar entre 6 e 10');

        $this->loteria->geraBilhete(5, 11);
    }
}