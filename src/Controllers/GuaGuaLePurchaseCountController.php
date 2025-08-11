<?php

namespace wusong8899\GuaGuaLe\Controllers;

use wusong8899\GuaGuaLe\Serializer\GuaGuaLePurchaseCountSerializer;
use wusong8899\GuaGuaLe\Model\GuaGuaLePurchaseCount;

use Flarum\Api\Controller\AbstractListController;
use Psr\Http\Message\ServerRequestInterface;
use Tobscure\JsonApi\Document;

class GuaGuaLePurchaseCountController extends AbstractListController
{
    public $serializer = GuaGuaLePurchaseCountSerializer::class;

    protected function data(ServerRequestInterface $request, Document $document)
    {
        $params = $request->getQueryParams();
        $actor = $request->getAttribute('actor');
        $userID = $actor->id;

        if (isset($userID)) {
            $guagualePurchaseCount = GuaGuaLePurchaseCount::select("gua_id as id", "total_pruchase_count")->where(["user_id" => $userID])->get();
            return $guagualePurchaseCount;
        }
    }
}
