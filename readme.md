# Loteria

uma aplicação para geração de bilhetes de loteria.

![Build Status](https://img.shields.io/badge/build-passing-brightgreen)
![Version](https://img.shields.io/badge/version-1.0.0-blue)
![License](https://img.shields.io/badge/license-MIT-yellowgreen)

## Índice

- [Sobre](#sobre)
- [Tecnologias Usadas no Projeto](#tecnologias-usadas-no-projeto)
- [Funções Nativas do PHP Usadas no Projeto](#funções-nativas-do-php-usadas-no-projeto)
- [Funcionalidades](#funcionalidades)
- [Instalação](#instalação)
- [Uso](#uso)
- [Tela Exemplo da Requisição JSON](#tela-exemplo-da-requisição-json)
- [Testes](#testes)

## Sobre

Este projeto foi criado para gerar números aleatórios para sorteios baseado em jogo de loteria.


## Tecnologias Usadas no Projeto

- PHP na versão 8.2
- Não foi usado nenhum frameword de PHP conforme solicitado.
- Docker e Docker-compose.
- Testes com PHPUnit na versão 9.5


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
- Verifica se a quantidade de bilhetes definida pelo usuário está entre 1 e 50.
- Verifica se a quantidade de dezenas definida pelo usuário está entre 6 e 10.


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


## Tela Exemplo da Requisição JSON

![Tela Principal](https://uc14aa6867c8740389c2064449d4.previews.dropboxusercontent.com/p/thumb/ACVlPi19szHOdagzifr7VMveADmDh_k3DYD7--J_7iTfYI816lMJL2Rfu5iZUWtzcWvRO5cywezCLbeiYx20_IzfwfSize8OoOxp3dWkKrsQTwgN_bkhuDiueghgD-Ry_inuVjO3WJjOC-NglcVFjq5aUbEr-l5-vsJJeI5FbOcKCaK7FAJZCpocrkfZ-WJTi-EcGxTsbbRD0aX_WzL9UejrbPmBdKkjIIiz3BsmGHL6TbnrsZK10c1ZfNq3q_RzErShT8yjUqW7wh6e26l5jaF8h8DneWhtumE4w_O2BW6OFLgWJUWGz2sLprmT533kD2y3tO5gH4_sa-4GVA7FWgAzgG2mWTgqF104XA-5ty-KcwjrvT-NABk4HYBX9HjEfGM/p.png?is_prewarmed=true&text=Exemplo+da+Requisição+Json)


## Testes

Para rodar os testes, execute o seguinte comando:

```bash
./vendor/bin/phpunit --bootstrap vendor/autoload.php tests/LoteriaTest.php
```