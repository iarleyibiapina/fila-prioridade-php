<?php

require __DIR__ . '/../../vendor/autoload.php';

use iarl\ApsPryscilla\Processamento\Dado;
use iarl\ApsPryscilla\Processamento\Service;
use iarl\ApsPryscilla\Processamento\TipoEnum;

// A prioridade é definida pelo tipo de usuario,
// o dado é processado pela fila e retornado

// Contexto: SUPER peso 5, REGIONAL peso 3, PARCEIRO peso 1
$dados = [
    new Dado(2, TipoEnum::PARCEIRO),
    new Dado([2,3,4], TipoEnum::REGIONAL),
    new Dado("string", TipoEnum::PARCEIRO),
    new Dado(["string","string"], TipoEnum::REGIONAL),
    new Dado([[2],8], TipoEnum::REGIONAL),
    new Dado([
        "ok" => 2,
    ], TipoEnum::SUPERINTENDENTE),
    new Dado(10000, TipoEnum::SUPERINTENDENTE),
];

$service = new Service($dados);

$service->processar();
