<?php

namespace App\Http;

class Response {
    private $httpCode = 200;
    private $headers = [];
    private $contentType = 'text/html';
    
    /**
     * Conteúdo do Response
     * @var mixed
     */
    private $content;

    /**
     * Método reponsável por iniciar a classe e definir os valores
     * @param integer $httpCode
     * @param mixed $content
     * @param string $contentType
     */
    public function __construct($httpCode, $content, $contentType = 'text/html') {
        $this->httpCode    = $httpCode;
        $this->content     = $content;
        $this->setContentType($contentType);
    }

    /**
     * Método responsável por alterar o content type do response
     * @param string $contentType
     */
    public function setContentType($contentType) {
        $this->contentType = $contentType;
        $this->addHeader('Content-type', $contentType);
    }

    /**
     * Método responsável por adicionar um registro no cabeçalho de response
     * @param string $key
     * @param string $value
     */
    public function addHeader($key, $value) {
        $this->headers[$key] = $value;
    }

    /**
     * Método responsável por enviar os headers a página
     */
    private function sendHeaders() {
        //STATUS
        http_response_code($this->httpCode);

        //Enviar Headers
        foreach($this->headers as $key => $value) {
            header($key. ': '. $value);
        }
    }

    /**
     * Método responsável por enviar a responsta do usuário
     */
    public function sendResponse(){
        $this->sendHeaders();

        switch($this->contentType) {
            case 'text/html':
                echo $this->content;
                exit;
        }
    }
}