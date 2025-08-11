<?php

namespace wusong8899\GuaGuaLe\Model;

use Flarum\Database\AbstractModel;
use Flarum\Database\ScopeVisibilityTrait;

class GuaGuaLePurchaseCount extends AbstractModel
{
    use ScopeVisibilityTrait;
    protected $table = 'wusong8899_guaguale_purchase_count';
    protected $fillable = ['user_id', 'gua_id', 'total_pruchase_count'];
}
