<?php

namespace wusong8899\GuaGuaLe\Controllers;

use wusong8899\GuaGuaLe\Serializer\GuaGuaLePurchaseSummarySerializer;
use wusong8899\GuaGuaLe\Model\GuaGuaLePurchase;

use Flarum\Api\Controller\AbstractListController;
use Psr\Http\Message\ServerRequestInterface;
use Tobscure\JsonApi\Document;

class GuaGuaLePurchaseHistorySummaryController extends AbstractListController
{
    public $serializer = GuaGuaLePurchaseSummarySerializer::class;

    protected function data(ServerRequestInterface $request, Document $document)
    {
        $actor = $request->getAttribute('actor');
        $userID = $actor->id;
        $guagualeCostTotalResult = GuaGuaLePurchase::where(["user_id" => $userID])->sum("pruchase_cost_total");
        $guagualeWinTotalResult = GuaGuaLePurchase::where(["user_id" => $userID])->sum("pruchase_win_total");

        $guagualeSummary = array(
            array("costTotal" => round($guagualeCostTotalResult, 2), "winTotal" => round($guagualeWinTotalResult, 2)),
        );

        return $guagualeSummary;
    }
}
