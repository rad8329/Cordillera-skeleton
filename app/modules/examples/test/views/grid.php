<?php

use cordillera\widgets\Grid;

/* @var $data_provider \cordillera\middlewares\db\adapters\sql\providers\ActiveRecord */

echo new Grid([
    'data_provider' => $data_provider,
    'columns' => [
        'code',
        'name',
    ],
]);
