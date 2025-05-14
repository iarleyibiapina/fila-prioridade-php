<?php

namespace iarl\ApsPryscilla\Processamento;

class Service
{
    protected Redis $redis;

    public function __construct(array $dados)
    {
        $this->redis = new Redis();
        foreach ($dados as $dado) {
            if($dado instanceof Dado){
                /** @var Dado $dado  */
                $this->redis->adicionar($dado->dado, $dado->tipo->value);
            }
        }
    }

    /**
     * Processa os dados da fila, se vazio apenas retorna
     * @return array<bool|string>
     */
    public function processar(): array
    {
        $processados = [];
        while (!$this->redis->vazia()) {
            sleep(random_int(0,3)); // simula processamento de cada arquivo
            $item = json_encode($this->redis->remover()); // retira elemento
            echo "Processado " . $item . "\n"; // exibe o elemento processado
            $processados[] = $item;
        }
        return $processados; // caso mais real, sem o uso do json
    }
}
