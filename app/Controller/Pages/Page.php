<?php

namespace App\Controller\Pages;

use \App\Utils\View;

class Page
{

    /**
     * Método responsável por retornar o header padrão
     * @return String
     */
    private static function getHeader() {
        return View::render('pages/header');
    }

    /**
     * Método responsável por retornar o rodapé padrão
     * @return String
     */
    private static function getFooter() {
        return View::render('pages/footer');
    }

    /**
     * Método responsável por retornar o conteudo da página padrão
     * @return String
     */
    public static function getPage($title, $content) {
        return View::render('pages/page', [
            'title' => $title,
            'header' => self::getHeader(),
            'content' => $content,
            'footer' => self::getFooter(),
        ]);
    }

}