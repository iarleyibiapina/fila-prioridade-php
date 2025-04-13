<?php

namespace iarl\ApsPryscilla\Classes;

use SplPriorityQueue;
use iarl\ApsPryscilla\Classes\Prioridade;

class SplFila
{
    protected SplPriorityQueue $fila;

    public function __construct()
    {
        $this->fila = new SplPriorityQueue();
        $this->fila->setExtractFlags(SplPriorityQueue::EXTR_BOTH); // permite extrair valor e prioridade
    }
    /**
     * Insere valores a fila
     * 
     * spl nativamente ja espera o valor e peso e organiza do maior para menor
     * @param array $dado
     * @throws \InvalidArgumentException
     * @return void
     */
    public function push(array $dado): void
    {
        if (!isset($dado['peso'])) {
            throw new \InvalidArgumentException("O dado precisa conter o campo 'peso'");
        }

        $this->fila->insert($dado, $dado['peso']); 
    }
    /**
     * Retorna os dados da fila
     * @return array
     */
    public function get(): array
    {
        $copia  = clone $this->fila;
        $result = [];
        foreach ($copia as $item) {
            $result[] = $item['data']; // assim eu extraio somente o dado
        }
        return $result;
    }
    /**
     * Extrai e retorna o dado ou nulo se vazio
     * @return mixed
     */
    public function pop(): mixed
    {
        return $this->fila->isEmpty() ? null : $this->fila->extract()['data']; 
    }
    /**
     * Executa a fila e processa cada dado de acordo com a prioridade definida
     * @param \iarl\ApsPryscilla\Classes\Prioridade $priority
     * @return mixed
     */
    public function run(Prioridade $priority): mixed
    {
        $metodo = $priority->value;
        return $this->$metodo();
    }

    private function highPriority(): void
    {
        while (!$this->fila->isEmpty()) {
            $item = $this->fila->extract();
            $this->handleItem($item['data'], $item['priority']);
        }
    }

    private function lowPriority(): void
    {
        // SplPriorityQueue não tem fila invertida, então vamos simular
        $todos = [];
        while (!$this->fila->isEmpty()) {
            $todos[] = $this->fila->extract();
        }

        usort($todos, fn($a, $b) => $a['priority'] <=> $b['priority']);

        foreach ($todos as $item) {
            $this->handleItem($item['data'], $item['priority']);
        }
    }

    private function defaultPriority(): void
    {
        // SplPriorityQueue não tem fila invertida, então vamos simular
        $todos = [];
        while (!$this->fila->isEmpty()) {
            $todos[] = $this->fila->extract();
        }
        foreach ($todos as $item) {
            $this->handleItem($item['data'], $item['priority']);
        }
    }

    private function handleItem(array $item, int $peso): void
    {
        echo "Processando {$item['nome']} (peso {$peso})...\n";
        sleep(1);
        echo "✔️ {$item['nome']} finalizado!\n\n";
    }
}
