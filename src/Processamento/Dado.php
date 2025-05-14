<?php

namespace iarl\ApsPryscilla\Processamento;

class Dado
{
    public function __construct
    (
        public readonly mixed $dado,
        public readonly TipoEnum $tipo,
    ) {}
}
