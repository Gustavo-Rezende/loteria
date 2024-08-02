# Loteria

uma aplicação para geração de bilhetes de loteria.

![Build Status](https://img.shields.io/badge/build-passing-brightgreen)
![Version](https://img.shields.io/badge/version-1.0.0-blue)
![License](https://img.shields.io/badge/license-MIT-yellowgreen)

## Índice

- [Sobre](#sobre)
- [Funções Nativas do PHP Usadas no Projeto](#funções-nativas-do-php-usadas-no-projeto)
- [Funcionalidades](#funcionalidades)
- [Instalação](#instalação)
- [Uso](#uso)
- [Testes](#testes)

## Sobre

Este projeto foi criado para gerar números aleatórios para sorteios baseado em jogo de loteria.

## Funções Nativas do PHP Usadas no Projeto

- range() - Cria uma matriz que varia valores entre 1 e 60.
- shuffle() - Faz a ordem dos elementos na matriz ficar de forma aleatória.
- array_slice() - Pega somente a quantidade determinada de uma matriz.
- sort() - Organiza uma matriz em ordem alfabética e crescente.
- array_intersect() - Compara os valores de duas matrizes e retorna os valores correspondentes.

## Funcionalidades

- Geração de bilhetes aleatórios organizados em ordem crescente com a quantidade de dezenas definidas pelo usuário.
- Geração de bilhetes premiados com 6 dezenas organizados em ordem crescente
- Verifica a sequencia de números premiados de cada bilhete gerado.


## Instalação

Siga estas etapas para instalar e configurar o projeto em sua máquina local.

1. **Clone o repositório:**
    ```bash
    git clone https://github.com/Gustavo-Rezende/loteria.git
    ```

2. **Navegue até o diretório do projeto:**
    ```bash
    cd loteria
    ```

3. **Insira o comando para buildar o Docker do projeto:**
    ```bash
    docker-compose up --build
    ```

4. **Rodar o projeto na porta 8000 como está configurado no docker-compose:**
    ```bash
    localhost:8000
    ```

## Uso

Via postman, criar uma requisição POST e no Body enviar um Json com os seguintes parâmetros:

- **Parâmetros Json:**
    ```bash
    {
        "quantidade_dezenas":6,
        "quantidade_bilhetes":10
    }
    ```

Altere os valores conforme desejar.


## Testes

Para rodar os testes, execute o seguinte comando:

```bash
./vendor/bin/phpunit --bootstrap vendor/autoload.php tests/LoteriaTest.php
```