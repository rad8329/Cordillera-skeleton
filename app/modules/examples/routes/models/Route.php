<?php

namespace modules\examples\routes\models;

use modules\examples\routes\helpers\Geom;
use cordillera\middlewares\db\ActiveRecord;

class Route extends ActiveRecord
{
    protected $_table_name = 'route';
    protected $_pk_name = 'id';

    public $id;
    public $name;
    public $zone_id;
    public $geom_route;
    public $geom_point_a;
    public $geom_point_b;
    public $code;

    public function afterFind()
    {
        if (!$this->isNew()) {
            $this->geom_route = Geom::getLineAsArray($this->geom_route);
            $this->geom_point_a = Geom::getPonintAsArray($this->geom_point_a);
            $this->geom_point_b = Geom::getPonintAsArray($this->geom_point_b);
        }
    }

    /**
     * @param int $id
     *
     * @return \modules\examples\routes\models\Route
     */
    public static function findByPk($id)
    {
        $sql = 'T.id,T.`code`,T.`name`,T.zone_id, AsText(T.geom_route) as geom_route,';
        $sql .= 'AsText(T.geom_point_a) as geom_point_a,AsText(T.geom_point_b) as geom_point_b';

        return self::find([
            'condition' => 'T.id = :id',
            'select' => $sql,
            'params' => [':id' => $id],
        ]);
    }
}
