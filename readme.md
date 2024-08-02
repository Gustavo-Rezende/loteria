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
    git clone https://github.com/usuario/repositorio.git
    ```

2. **Navegue até o diretório do projeto:**
    ```bash
    cd repositorio
    ```

3. **Instale as dependências:**
    ```bash
    npm install
    ```

4. **Configure as variáveis de ambiente:**
    Crie um arquivo `.env` na raiz do projeto e adicione as seguintes variáveis:
    ```
    DATABASE_URL=your_database_url
    API_KEY=your_api_key
    ```

5. **Inicie o servidor:**
    ```bash
    npm start
    ```

## Uso

Aqui estão alguns exemplos de como usar o projeto:

- **Criar uma nova tarefa:**
    ```bash
    curl -X POST http://localhost:3000/tasks -d '{"title":"Nova Tarefa","dueDate":"2024-08-01"}' -H "Content-Type: application/json"
    ```

- **Listar todas as tarefas:**
    ```bash
    curl http://localhost:3000/tasks
    ```

- **Marcar uma tarefa como concluída:**
    ```bash
    curl -X PATCH http://localhost:3000/tasks/1 -d '{"completed":true}' -H "Content-Type: application/json"
    ```


## Testes

Para rodar os testes, execute o seguinte comando:

```bash
npm test
