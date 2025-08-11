<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\Builder;

return [
    'up' => function (Builder $schema) {
        if (!$schema->hasTable('wusong8899_guaguale_purchase_count')) {
            $schema->create('wusong8899_guaguale_purchase_count', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('gua_id')->unsigned();
                $table->integer('user_id')->unsigned();
                $table->integer('total_pruchase_count')->unsigned();

                $table->unique(['gua_id', 'user_id']);
                $table->foreign('gua_id')->references('id')->on('wusong8899_guaguale')->onDelete('cascade');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            });
        }
    },
    'down' => function (Builder $schema) {
        $schema->drop('wusong8899_guaguale_purchase_count');
    },
];
