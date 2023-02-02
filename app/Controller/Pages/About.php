<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Entity\Organization;

class About extends Page
{

    /**
     * Método responsável por retornar o conteudo da about
     * @return String
     */
    public static function getAbout()
    {
        $obOrganization = new Organization;

        //View da about
        $content = View::render('pages/about', [
            'name' => $obOrganization->name,
            'description' => $obOrganization->description
        ]);

        //View da page
        return parent::getPage('SOBRE > FoxSytem', $content);
    }
}
