<?php

namespace wusong8899\GuaGuaLe\Controllers;

use wusong8899\GuaGuaLe\Serializer\GuaGuaLeSerializer;
use wusong8899\GuaGuaLe\Model\GuaGuaLe;

use Flarum\Api\Controller\AbstractListController;
use Psr\Http\Message\ServerRequestInterface;
use Tobscure\JsonApi\Document;

class ListGuaGuaLeController extends AbstractListController
{
    public $serializer = GuaGuaLeSerializer::class;

    protected function data(ServerRequestInterface $request, Document $document)
    {
        $guagualeData = GuaGuaLe::where(["activated" => 1])->orderBy('id', 'desc')->get();
        return $guagualeData;
    }
}
