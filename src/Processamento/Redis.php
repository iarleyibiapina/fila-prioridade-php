<?php

namespace iarl\ApsPryscilla\Processamento;

use SplPriorityQueue;

class Redis
{
    private SplPriorityQueue $fila;

    public function __construct() 
    {
        $this->fila = new SplPriorityQueue();
        $this->fila->setExtractFlags(flags: SplPriorityQueue::EXTR_BOTH); 
        // ao extrair tanto o dado em si quanto a prioridade
        // sera retornado. ir ate a linha 29
    }
    /**
     * Adicionar a fila
     * @param mixed $valor
     * @param int $peso
     * @return void
     */
    public function adicionar(mixed $valor, int $peso): void 
    {
        $this->fila->insert(value: $valor, priority: $peso);
    }

    /**
     * Retorna os dados removidos com a prioridade, ou null se a fila estiver vazia.
     * @return array{
     *   data: mixed, priority: mixed
     * }|null 
     */
    public function remover(): mixed
    {
        return $this->fila->isEmpty() ? null : $this->fila->extract();
    }
    /**
     * Verifica se vazia
     * @return bool
     */
    public function vazia(): bool 
    {
        return $this->fila->isEmpty();
    }
}
