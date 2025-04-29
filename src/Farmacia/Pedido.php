<?php

namespace iarl\ApsPryscilla\Farmacia;

class Pedido
{
    public function __construct(
        public string $produto, 
        public string $peso, 
        public string $prazo
        ){}

    public function __toString() {
        return "Produto: {$this->produto}, Peso: {$this->peso}, Prazo: {$this->prazo}h";
    }}
