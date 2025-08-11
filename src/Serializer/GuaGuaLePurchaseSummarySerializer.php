<?php

namespace wusong8899\GuaGuaLe\Serializer;

use Flarum\Api\Serializer\AbstractSerializer;
use wusong8899\GuaGuaLe\Serializer\GuaGuaLeSerializer;

class GuaGuaLePurchaseSummarySerializer extends AbstractSerializer
{
    protected $type = 'guagualePurchaseHistorySummary';

    protected function getDefaultAttributes($data)
    {
        $attributes = [
            'costTotal' => $data["costTotal"],
            'winTotal' => $data["winTotal"],
        ];

        return $attributes;
    }
}
