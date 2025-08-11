<?php

namespace wusong8899\GuaGuaLe\Model;

use Flarum\Database\AbstractModel;
use Flarum\Database\ScopeVisibilityTrait;

class GuaGuaLeTickets extends AbstractModel
{
    use ScopeVisibilityTrait;
    protected $table = 'wusong8899_guaguale_tickets';
}
