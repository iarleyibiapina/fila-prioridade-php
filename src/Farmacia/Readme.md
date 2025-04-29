# Fila com Prioridades para Farmácia

## Contexto
Uma farmácia recebe pedidos de entrega de medicamentos e produtos de saúde. Cada pedido contém um produto com uma **prioridade** (baseada na urgência do medicamento) e um **prazo de entrega** (tempo máximo para entrega, em horas). A farmácia utiliza uma **fila com prioridades** para processar os pedidos, onde:

- **Peso**: Representa a urgência do produto (maior peso = maior prioridade).
- **Prazo**: Dentro de cada nível de prioridade, pedidos com menor prazo são processados primeiro.

## Produtos e Pesos
Os produtos são categorizados com base na sua criticidade para o paciente. A tabela abaixo apresenta exemplos de produtos, suas categorias, pesos (escala de 1 a 5, onde 5 é mais prioritário) e prazos típicos de entrega:

| Produto                     | Categoria                  | Peso (Prioridade) | Prazo de Entrega (Horas) |
|-----------------------------|----------------------------|-------------------|--------------------------|
| Insulina                    | Medicamento Crítico        | 5                 | 1–4                      |
| Antibiótico (Amoxicilina)   | Medicamento Urgente        | 4                 | 2–6                      |
| Analgésico (Paracetamol)    | Medicamento Comum          | 3                 | 4–12                     |
| Suplemento Vitamínico       | Suplemento Não Urgente     | 2                 | 12–24                    |
| Protetor Solar              | Cosmético Não Urgente      | 1                 | 24–48                    |

## Saída Esperada
A fila com prioridades processa os pedidos na seguinte ordem, considerando peso (maior primeiro) e prazo (menor primeiro dentro do mesmo peso):

```
Processando pedidos:
Produto: Insulina, Peso: 5, Prazo: 2h
Produto: Insulina, Peso: 5, Prazo: 3h
Produto: Antibiótico, Peso: 4, Prazo: 4h
Produto: Analgésico, Peso: 3, Prazo: 6h
Produto: Suplemento Vitamínico, Peso: 2, Prazo: 12h
```

## Implementação em PHP
Abaixo está o código PHP que implementa a fila com prioridades usando `SplPriorityQueue`. A fila ordena pedidos por peso (maior prioridade) e, em caso de empate, por prazo (menor prazo primeiro).

```php
<?php

// Classe para representar um pedido
class Pedido {
    public function __construct(
        public string $produto, 
        public string $peso, 
        public string $prazo
        ){}

    public function __toString() {
        return "Produto: {$this->produto}, Peso: {$this->peso}, Prazo: {$this->prazo}h";
    }
}

// Fila com prioridades para a farmácia
class FilaFarmacia {
    private SplPriorityQueue $fila;

    public function __construct() {
        $this->fila = new SplPriorityQueue();
        $this->fila->setExtractFlags(SplPriorityQueue::EXTR_BOTH);
    }

    // Adiciona um pedido à fila
    public function adicionar(Pedido $pedido) {
        // Usa peso como prioridade principal e prazo como desempate
        $this->fila->insert($pedido, [$pedido->peso, -$pedido->prazo]);
    }

    // Remove e retorna o próximo pedido
    public function processar() {
        if ($this->fila->isEmpty()) {
            return null;
        }
        return $this->fila->extract()['data'];
    }

    // Verifica se a fila está vazia
    public function estaVazia() {
        return $this->fila->isEmpty();
    }
}

// Teste do cenário
$fila = new FilaFarmacia();

// Adiciona pedidos
$fila->adicionar(pedido: new Pedido(produto: "Insulina", peso: 5, prazo: 2));
$fila->adicionar(pedido: new Pedido(produto: "Insulina 2", peso: 5, prazo: 3));
$fila->adicionar(pedido: new Pedido(produto: "Antibiótico", peso: 4, prazo: 4));
$fila->adicionar(pedido: new Pedido(produto: "Antibiótico 2", peso: 4, prazo: 5));
$fila->adicionar(pedido: new Pedido(produto: "Analgésico", peso: 3, prazo: 6));
$fila->adicionar(pedido: new Pedido(produto: "Analgésico 2", peso: 3, prazo: 8));
$fila->adicionar(pedido: new Pedido(produto: "Suplemento Vitamínico", peso: 2, prazo: 12));
$fila->adicionar(pedido: new Pedido(produto: "Suplemento Vitamínico 2", peso: 2, prazo: 15));

// Processa os pedidos
echo "Processando pedidos:\n";
while (!$fila->estaVazia()) {
    $pedido = $fila->processar();
    echo $pedido . "\n";
}

?>
```

## Explicação do Código
- **Classe `Pedido`**: Representa um pedido com `produto`, `peso` e `prazo`.
- **Classe `FilaFarmacia`**:
  - Usa `SplPriorityQueue` (baseada em *max-heap*).
  - `setExtractFlags(SplPriorityQueue::EXTR_BOTH)`: Retorna dado e prioridade ao extrair.
  - `insert`: Insere pedidos com prioridade `[peso, -prazo]` (maior peso primeiro; menor prazo como desempate, usando negativo).
  - `processar`: Remove e retorna o pedido de maior prioridade.
- **Saída**: Pedidos são processados na ordem especificada, conforme peso e prazo.

