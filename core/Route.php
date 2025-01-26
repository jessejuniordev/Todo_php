<?php

namespace core;

class Route
{
    /**
     * Pega os valores la das minhas rotas para comparar
     */
    public function __construct(public string $uri, public string $request, public string $controller) {}


    /**
     * Captura minha URI sem query nem a '/' no final -> /cart/ || /cart?id=23 = /cart
     * 
     * @return string URI atual
     */
    private function currentUri()
    {
        $request_uri = $_SERVER['REQUEST_URI'];
        return $request_uri !== '/' ? rtrim(parse_url($request_uri, PHP_URL_PATH), '/') : '/';
    }


    /**
     * Captura minha requisição HTTP
     * 
     * @return string 
     */
    private function currentRequest()
    {
        $request_method = strtolower($_SERVER['REQUEST_METHOD']);
        return $request_method;
    }

    
    /**
     * Comparar a URI/Request atual com o URI/Request das minhas rotas
     * 
     * @return this
     */
    public function match()
    {
        $uri = $this->uri;
        $request = strtolower($this->request);

        if ($uri === $this->currentUri() && $request === $this->currentRequest()) {
            return $this;
        }
    }
}
