<?php
namespace modules\examples\routes\helpers;

class Geom
{
    /**
     * @param string $line The linestring geometry data as string
     * @return array
     */
    public static function getLineAsArray($line)
    {
        if (empty($line)) {
            return [];
        }
        preg_match_all('/([0-9.\-]+) ([0-9.\-]+)/', $line, $matches);

        $result = array_map(function ($x, $y) {
            return ['x' => $x, 'y' => $y];
        }, $matches[1], $matches[2]);

        return $result;
    }

    /**
     * @param string $point The point geometry data as string
     * @return array
     */
    public static function getPonintAsArray($point)
    {
        if (empty($line)) {
            return [];
        }

        preg_match_all('/([0-9.\-]+) ([0-9.\-]+)/', $point, $matches);

        $result = array_map(function ($x, $y) {
            return ['x' => $x, 'y' => $y];
        }, $matches[1], $matches[2]);

        return $result[0];
    }
}