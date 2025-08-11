<?php

namespace wusong8899\GuaGuaLe\Controllers;

use wusong8899\GuaGuaLe\Serializer\GuaGuaLePurchaseSerializer;
use wusong8899\GuaGuaLe\Model\GuaGuaLePurchase;

use Flarum\Api\Controller\AbstractListController;
use Psr\Http\Message\ServerRequestInterface;
use Tobscure\JsonApi\Document;

class GuaGuaLePurchaseListController extends AbstractListController
{
    public $serializer = GuaGuaLePurchaseSerializer::class;
    public $include = ['purchasedUser'];

    protected function data(ServerRequestInterface $request, Document $document)
    {
        $params = $request->getQueryParams();
        $actor = $request->getAttribute('actor');
        $userID = $actor->id;
        $guaID = $params["guaID"];

        if (isset($userID) && isset($guaID)) {
            $guagualeDetails = GuaGuaLePurchase::where(["opened" => 1, "gua_id" => $guaID])->orderBy('open_at', 'desc')->limit(30)->get();
            return $guagualeDetails;
        }
    }
}
