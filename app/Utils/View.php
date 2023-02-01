<?php

namespace App\Utils;

class View 
{

    /**
     * Método responsável por retornar o conteúdo de uma view
     * @param String $view
     * @return String
     */
    private static function getContentView($view){
        $file = __DIR__.'/../../src/view/'. $view . '.html';
        return file_exists($file) ? file_get_contents($file) : '';
    }    

    /**
     * Método responsável por retornar o conteúdo renderizado de uma view
     * @param String $view
     * @param Array $vars (string/numeric)
     * @return String
     */
    public static function render($view, $vars = []){
        //Conteúdo da view
        $contentView = self::getContentView($view);

        //Chaves do array de variavéis
        $keys = array_keys($vars);
        $keys = array_map(function($item) {
            return '{{ '. $item .' }}';
        }, $keys);

        //Retorna conteudo renderizado
        return str_replace($keys, array_values($vars),$contentView) ;
    }
}