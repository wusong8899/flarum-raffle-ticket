<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\Builder;

return [
    'up' => function (Builder $schema) {
        if (!$schema->hasTable('wusong8899_guaguale_tickets')) {
            $schema->create('wusong8899_guaguale_tickets', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('gua_id')->unsigned();
                $table->integer('value')->default(0);
                $table->string('flag', 255);

                $table->index('flag');
                $table->foreign('gua_id')->references('id')->on('wusong8899_guaguale')->onDelete('cascade');
            });
        }
    },
    'down' => function (Builder $schema) {
        $schema->drop('wusong8899_guaguale_tickets');
    },
];
