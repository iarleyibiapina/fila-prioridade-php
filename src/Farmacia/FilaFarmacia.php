<?php

namespace iarl\ApsPryscilla\Farmacia;

use SplPriorityQueue;
use iarl\ApsPryscilla\Farmacia\Pedido;

class FilaFarmacia
{
    // estrutura de dados nativa do php, fila com prioridade
    private SplPriorityQueue $fila;

    public function __construct() 
    {
        $this->fila = new SplPriorityQueue();
        $this->fila->setExtractFlags(flags: SplPriorityQueue::EXTR_BOTH); // ao extrair tanto o dado em si quanto a prioridade
        // sera retornado. ir ate a linha 29
    }

    public function adicionar(Pedido $pedido): void 
    {
        // o segundo parametro é a prioridade, onde recebe um array que por sua vez
        // tem como segundo valor o criterio para desempatar e definir a prioridade em cima da prioridade principal
        // o prazo é negativo pois quanto menor o prazo, maior o peso
        $this->fila->insert(value: $pedido, priority: [$pedido->peso, -$pedido->prazo]);
    }

    public function processar(): mixed 
    {
        if ($this->fila->isEmpty()) return null;
        return $this->fila->extract()['data']; // por isso é explicito aqui o que sera retornado - voltar a linha 16
    }

    public function estaVazia(): bool 
    {
        return $this->fila->isEmpty();
    }
}
