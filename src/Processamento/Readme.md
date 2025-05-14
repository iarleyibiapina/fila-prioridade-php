# Fila Prioritária com PHP

Este projeto implementa uma fila com prioridade em PHP puro, utilizando a estrutura `SplPriorityQueue` para gerenciar dados com base em prioridades definidas por tipos de usuários.

## Objetivo

Simular o processamento de dados com diferentes prioridades, onde cada tipo de usuário possui um peso associado. Dados com maior prioridade são processados antes dos demais.

## Tipos de Usuários e Pesos

- **SUPERINTENDENTE**: peso 5
- **REGIONAL**: peso 3
- **PARCEIRO**: peso 1

## Estrutura do Projeto

- **`Redis.php`**: Encapsula a lógica da fila utilizando `SplPriorityQueue`. Gerencia operações de inserção, remoção e verificação de dados.
- **`Dado.php`**: Define a estrutura de dados, contendo o valor e o tipo de usuário (enum `TipoEnum`).
- **`Service.php`**: Responsável por adicionar dados à fila e processá-los em ordem de prioridade.

## Exemplo de Uso

```php
$dados = [
    new Dado(2, TipoEnum::PARCEIRO),
    new Dado([2,3,4], TipoEnum::REGIONAL),
    new Dado("string", TipoEnum::PARCEIRO),
    new Dado(["string","string"], TipoEnum::REGIONAL),
    new Dado([[2],8], TipoEnum::REGIONAL),
    new Dado(["ok" => 2], TipoEnum::SUPERINTENDENTE),
    new Dado(10000, TipoEnum::SUPERINTENDENTE),
];

$service = new Service($dados);
$service->processar();
```

## Requisitos

- PHP 8.1 ou superior
- Composer (para autoload de classes)

## Como Executar

1. Clone o repositório ou copie os arquivos para seu ambiente local.
2. Instale as dependências, se necessário:

   ```bash
   composer install
   ```

3. Execute o script principal, substituindo o caminho pelo local do seu script:

   ```bash
   php path/para/seu/script.php
   ```

## Saída Esperada

Os dados são processados na ordem de prioridade, de acordo com os pesos:
1. **SUPERINTENDENTE** (peso 5)
2. **REGIONAL** (peso 3)
3. **PARCEIRO** (peso 1)

Com base no "Exemplo de Uso", a ordem de processamento seria:
- `["ok" => 2]` (SUPERINTENDENTE)
- `10000` (SUPERINTENDENTE)
- `[2,3,4]` (REGIONAL)
- `["string","string"]` (REGIONAL)
- `[[2],8]` (REGIONAL)
- `2` (PARCEIRO)
- `"string"` (PARCEIRO)

## 👥 Equipe

- Iarley Ibiapina Barbosa
- Antonio Gabriel Benevides Gondim
- Paulo Cezar Nascimento Dos Santos
- Bruno Teixeira de Souza
