<?php 

require "../vendor/autoload.php";

use iarl\ApsPryscilla\Classes\Fila;
use iarl\ApsPryscilla\Classes\Prioridade;
use iarl\ApsPryscilla\classes\SimplesComEstruturaDeDados;
use iarl\ApsPryscilla\Classes\SplFila;

/**
 * Meio mais simples e rapido, com o uso de array e estrutura
 * esperada para X contexto
 * @return void
 */
function meio1()
{
    require_once './SimplesComArray.php';
}
/**
 * Meio um, utilizando array simples do php, pouco de POO e alguns metodos
 * 
 * ! Não perfeitamente implementado pois depende das chaves 'nome' e 'peso' no array informado
 * ? Se informado algum peso que nao exista, ele ja organiza
 * ? é possivel definir o tipo de prioridade
 * @return void
 */
function meio2()
{   
    $fila = new Fila();
    
    $fila->push(['nome' => 'A',  'peso' => 3]);
    $fila->push(['nome' => 'B',  'peso' => 1]);
    $fila->push(['nome' => 'BB', 'peso' => 11]);
    $fila->push(['nome' => 'C',  'peso' => 5]);
    $fila->push(['nome' => 'D',  'peso' => 3]);
    $fila->push(['nome' => 'E',  'peso' => 1]);
    $fila->push(['nome' => 'F',  'peso' => 5]);
    
    $fila->pop();
    
    $fila->run();
    var_dump( $fila->get());
}
/**
 * Meio tres, com o uso da FILA nativo do PHP.
 * 
 * Ela organiza o peso de maneira automatica
 * @return void
 */
function meio3()
{
    $classe = new SimplesComEstruturaDeDados(new SplPriorityQueue());

    // Dados simulados
    $dados = [
        ['nome' => 'A', 'peso' => 3],
        ['nome' => 'B', 'peso' => 1],
        ['nome' => 'C', 'peso' => 5],
        ['nome' => 'D', 'peso' => 3],
        ['nome' => 'E', 'peso' => 1],
        ['nome' => 'F', 'peso' => 5],
    ];

    // Inserindo dados na fila com prioridade
    foreach ($dados as $item) {
        $classe->insert($item, $item['peso']); // item + peso como prioridade
    }

    // alguns casos extras...

    $classe->extract();
    $classe->extract();

    $classe->insert(['nome' => 'ultra_maxima_over_power'], 15);
    $classe->insert(['nome' => 'novo'], 10);
    $classe->insert(['nome' => 'pior_de_todos'],0);

    $classe->execute();

}
/**
 * Meio quatro, tambem utilizando FILA nativa
 * 
 * com o adicional de defnicao de prioridade
 * @return void
 */
function meio4()
{   
    $fila = new SplFila();
    
    $fila->push(['nome' => 'A',  'peso' => 3]);
    $fila->push(['nome' => 'B',  'peso' => 1]);
    $fila->push(['nome' => 'C',  'peso' => 5]);
    $fila->push(['nome' => 'D',  'peso' => 3]);
    $fila->push(['nome' => 'E',  'peso' => 1]);
    // 
    $fila->pop();
    $fila->push(['nome' => 'BB', 'peso' => 11]);
    // 
    $fila->push(['nome' => 'F',  'peso' => 5]);
    
    $fila->run();
    var_dump( $fila->get());
}
    
    
// meio1();
// meio2();
// meio3();
meio4();