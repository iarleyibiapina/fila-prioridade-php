<?php

require __DIR__ . '/../../vendor/autoload.php';

use iarl\ApsPryscilla\Farmacia\Pedido;
use iarl\ApsPryscilla\Farmacia\FilaFarmacia;

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

// Ordena com maior peso, dentre os maiores pesos ordena o com menor prazo

// SAIDA ESPERADA
// Processando pedidos:
// Produto: Insulina, Peso: 5, Prazo: 2h
// Produto: Insulina, Peso: 5, Prazo: 3h
// Produto: Antibiótico, Peso: 4, Prazo: 4h
// Produto: Analgésico, Peso: 3, Prazo: 6h
// Produto: Suplemento Vitamínico, Peso: 2, Prazo: 12h