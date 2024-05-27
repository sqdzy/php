<?php

namespace src\View;

class View
{
    public function __construct(private $pathTemplate)
    {
    }
    public function renderHtml(string $templateName, array $var = [], $code = 200)
    {
        http_response_code($code);
        extract($var);
        include($this->pathTemplate . $templateName);
    }
}