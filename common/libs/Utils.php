<?php

namespace common\libs;

/**
 * Class Utils
 * @package common\libs
 */
class Utils extends \ijony\helpers\Utils
{

    /**
     * @param $string
     *
     * @return mixed|string|string[]|null
     */
    public static function genSlug($string)
    {
        $string = strtolower(trim($string));
        $string = str_replace(['"', '\''], ['', ''], $string);
        $string = preg_replace("/\s+/", "-", $string);

        return $string;
    }
}