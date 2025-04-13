<?php

namespace iarl\ApsPryscilla\Classes;

enum Prioridade: string
{
    case Alta  = 'highPriority'; // Descendente
    case Media = 'defaultPriority'; // De acordo com o inserido 
    case Baixa = 'lowPriority'; // Ascendente 
    // Método utilitário para retornar todas as prioridades em ordem decrescente
    public static function todas(): array
    {
        return [
            self::Alta,
            self::Media,
            self::Baixa,
        ];
    }
}
