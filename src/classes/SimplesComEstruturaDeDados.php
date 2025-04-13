<?php
namespace iarl\ApsPryscilla\classes;

use SplPriorityQueue;

class SimplesComEstruturaDeDados
{
    public function __construct(
        private SplPriorityQueue $fila
    ) {
    }

    public function insert(mixed $dado, int $peso)
    {
        $this->fila->insert($dado, $peso);
    }

    public function extract()
    {
        return $this->fila->extract();
    }

    public function execute()
    {
        while (!$this->fila->isEmpty()) {
            $item = $this->fila->extract();
            echo "Processando {$item['nome']} \n";
            sleep(1); 
            echo "✔️ {$item['nome']} finalizado!\n\n";
        }
    }
}

