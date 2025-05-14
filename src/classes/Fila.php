<?php

namespace iarl\ApsPryscilla\Classes;

class Fila
{
    protected array $fila = [];

    protected array $pesos = [
        5 => [],
        3 => [],
        1 => [],
    ];

    public function get(): array
    {
        return $this->fila;
    }

    public function push(mixed $dado): void
    {
        if (!isset($dado['peso'])) {
            throw new \InvalidArgumentException("O dado precisa conter o campo 'peso'");
        }

        if (!isset($dado['nome'])) {
            throw new \InvalidArgumentException("O dado precisa conter o campo 'nome'");
        }

        // alimenta a fila, sem atribuir o peso
        $this->fila[] = $dado;

        // caso nao exista o peso
        if(!isset($this->pesos[$dado['peso']])) $this->pesos[$dado['peso']] = [];

        $this->pesos[$dado['peso']][] = $dado;
    }

    public function pop(): mixed
    {
        // retira o ultimo elemento da fila indepentende do peso
        $item = array_pop($this->fila);
        array_pop($this->pesos[$item['peso']]);
        return $item;
    }

    public function run(): void
    {
        foreach($this->pesos as $priority){
            $this->handleItem($priority); // executa todos os items desta fila
        };
    }

    private function handleItem(array $fila): void
    {
        // processar os dados de acord com o peso
        foreach ($fila as $item) {
            echo "Processando {$item['nome']} (peso {$item['peso']})...\n";
            sleep(1); // simula o tempo de processamento
            echo "✔️ {$item['nome']} finalizado!\n\n";
            $this->pop(); // retira o item
        }
    }
}
