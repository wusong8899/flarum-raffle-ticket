<?php

namespace wusong8899\GuaGuaLe\Controllers;

use wusong8899\GuaGuaLe\Serializer\GuaGuaLePurchaseSerializer;
use wusong8899\GuaGuaLe\Model\GuaGuaLePurchase;

use Flarum\Api\Controller\AbstractListController;
use Psr\Http\Message\ServerRequestInterface;
use Tobscure\JsonApi\Document;
use Flarum\Http\UrlGenerator;

class ListGuaGuaLePurchaseHisotryController extends AbstractListController
{
    public $serializer = GuaGuaLePurchaseSerializer::class;
    public $include = ['guagualeData'];
    protected $url;

    public function __construct(UrlGenerator $url)
    {
        $this->url = $url;
    }

    protected function data(ServerRequestInterface $request, Document $document)
    {
        $params = $request->getQueryParams();
        $include = $this->extractInclude($request);
        $actor = $request->getAttribute('actor');
        $limit = $this->extractLimit($request);
        $offset = $this->extractOffset($request);

        $userID = $actor->id;
        $guagualePurchaseQuery = GuaGuaLePurchase::where(["user_id" => $userID]);
        $guagualePurchaseResult = $guagualePurchaseQuery
            ->skip($offset)
            ->take($limit + 1)
            ->orderBy('id', 'desc')
            ->get();

        $hasMoreResults = $limit > 0 && $guagualePurchaseResult->count() > $limit;

        if ($hasMoreResults) {
            $guagualePurchaseResult->pop();
        }

        $document->addPaginationLinks(
            $this->url->to('api')->route('guaguale.history'),
            $params,
            $offset,
            $limit,
            $hasMoreResults ? null : 0
        );

        $this->loadRelations($guagualePurchaseResult, $include);

        return $guagualePurchaseResult;
    }
}
