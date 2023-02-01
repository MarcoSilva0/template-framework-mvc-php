<?php

namespace App\Http;

class Request 
{
    /**
     * Método HTTP da requisição
     * @var String
     */
    private $httpMethod;
    
    /**
     * URI da página
     * @var String
     */
    private $uri;

    /**
     * Parâmetros da URL ($_GET)
     * @var Array
     */
    private $queryParams = [];

    /**
     * Váriaveis recebidas no POST da página ($_POST)
     * @var Array
     */
    private $postVars = [];

    /**
     * Cabeçalho da requisição
     * @var Array
     */
    private $headers = [];

    public function __construct(){
        $this->queryParams  = $_GET ?? [];
        $this->postVars     = $_POST ?? [];
        $this->headers      = getallheaders();
        $this->httpMethod   = $_SERVER['REQUEST_METHOD'];
        $this->uri          = $_SERVER['REQUEST_URI'];
    }

    /**
     * Getter
     */

    public function getHttpMethod() {
        return $this->httpMethod;
    }

    public function getUri() {
        return $this->uri;
    }
    
    public function getHeaders() {
        return $this->headers;
    }

    public function geQueryParams() {
        return $this->queryParams;
    }

    public function getPostVars() {
        return $this->postVars;
    }
}