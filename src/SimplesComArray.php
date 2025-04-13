<?php 

$dados = [
    ['nome' => 'A', 'peso' => 3],
    ['nome' => 'B', 'peso' => 1],
    ['nome' => 'C', 'peso' => 5],
    ['nome' => 'D', 'peso' => 3],
    ['nome' => 'E', 'peso' => 1],
    ['nome' => 'F', 'peso' => 5],
];

// Filas separadas por prioridade
$filas = [
    5 => [],
    3 => [],
    1 => [],
];

// Distribuir os dados nas filas correspondentes
foreach ($dados as $dado) {
    $filas[$dado['peso']][] = $dado;
}

// Função que processa os dados
function processarFila(array $fila, int $peso) {
    foreach ($fila as $item) {
        echo "Processando {$item['nome']} (peso {$peso})...\n";
        sleep($peso/2); // simula o tempo de processamento
        echo "✔️ {$item['nome']} finalizado!\n\n";
    }
}

// Ordem de prioridade: 5 → 3 → 1
foreach ([5, 3, 1] as $prioridade) {
    processarFila($filas[$prioridade], $prioridade);
}