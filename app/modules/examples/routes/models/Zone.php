<?php

namespace modules\examples\routes\models;

use cordillera\middlewares\db\ActiveRecord;

class Zone extends ActiveRecord
{
    protected $_table_name = 'zone';
    protected $_pk_name = 'id';

    public $id;
    public $name;
}
