<?php

namespace wusong8899\GuaGuaLe\Controllers;

use Flarum\Frontend\Document;
use Psr\Http\Message\ServerRequestInterface;

class GuaGuaLeIndexController
{
    public function __invoke(Document $document, ServerRequestInterface $request)
    {
        return $document;
    }
}
