<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\Builder;

return [
    'up' => function (Builder $schema) {
        if (!$schema->hasColumn('wusong8899_guaguale', 'limit')) {
            $schema->table('wusong8899_guaguale', function (Blueprint $table) {
                $table->integer('limit')->unsigned()->default(0);
            });
        }
    },
    'down' => function (Builder $schema) {

    }
];
