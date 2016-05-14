<?php


namespace malahov\core;


class Validator
{
    public static function clean($value = '') {
        $value = trim($value);
        $value = htmlentities($value);

        return $value;
    }
}