<?php

use Flarum\Extend;
use wusong8899\GuaGuaLe\Controllers\GuaGuaLeIndexController;
use wusong8899\GuaGuaLe\Controllers\GuaGuaLeHistoryController;
use wusong8899\GuaGuaLe\Controllers\ListGuaGuaLeController;
use wusong8899\GuaGuaLe\Controllers\GuaGuaLePurchaseController;
use wusong8899\GuaGuaLe\Controllers\GuaGuaLePurchaseListController;
use wusong8899\GuaGuaLe\Controllers\GuaGuaLePurchaseCountController;
use wusong8899\GuaGuaLe\Controllers\ListGuaGuaLePurchaseHisotryController;
use wusong8899\GuaGuaLe\Controllers\GuaGuaLePurchaseHistorySummaryController;
use wusong8899\GuaGuaLe\Controllers\GuaGuaLePurchaseUpdateController;
use wusong8899\GuaGuaLe\Controllers\GuaGuaLeUpdateController;
use wusong8899\GuaGuaLe\Controllers\GuaGuaLeAddController;

use wusong8899\GuaGuaLe\Model\GuaGuaLePurchase;
use wusong8899\GuaGuaLe\Model\GuaGuaLe;
use wusong8899\GuaGuaLe\Notification\GuaGuaLeBlueprint;
use wusong8899\GuaGuaLe\Serializer\GuaGuaLePurchaseSerializer;

$extend = [
    (new Extend\Frontend('admin'))->js(__DIR__ . '/js/dist/admin.js')->css(__DIR__ . '/less/admin.less'),
    (new Extend\Frontend('forum'))->js(__DIR__ . '/js/dist/forum.js')->css(__DIR__ . '/less/forum.less')
        ->route('/guaguale', 'guaguale.index', GuaGuaLeIndexController::class),

    (new Extend\Locales(__DIR__ . '/locale')),

    (new Extend\Routes('api'))
        ->get('/guagualeList', 'guaguale.get', ListGuaGuaLeController::class)
        ->post('/guagualeList', 'guaguale.add', GuaGuaLeAddController::class)
        ->get('/guagualePurchaseCount', 'guaguale.purchaseCount', GuaGuaLePurchaseCountController::class)
        ->get('/guagualePurchaseList', 'guaguale.details', GuaGuaLePurchaseListController::class)
        ->post('/guagualePurchase', 'guaguale.purchase', GuaGuaLePurchaseController::class)
        ->patch('/guagualeList/{id}', 'guaguale.update', GuaGuaLeUpdateController::class)
        ->patch('/guagualePurchase/{purchase_id}', 'guagualePurchase.update', GuaGuaLePurchaseUpdateController::class)
        ->get('/guagualePurchaseHistory', 'guaguale.history', ListGuaGuaLePurchaseHisotryController::class)
        ->get('/guagualePurchaseHistorySummary', 'guaguale.summary', GuaGuaLePurchaseHistorySummaryController::class),
    (new Extend\Settings())
        ->serializeToForum('guagualeDisplayName', 'wusong8899-guaguale.guagualeDisplayName', 'strval')
        ->serializeToForum('guagualeTimeZone', 'wusong8899-guaguale.guagualeTimezone'),
    (new Extend\Notification())
        ->type(GuaGuaLeBlueprint::class, GuaGuaLePurchaseSerializer::class, ['alert']),
];

return $extend;