<?php


namespace malahov\core;


class Validator
{
    public static function clean($value = '') {
        $value = trim($value);
        $value = stripslashes($value);
        $value = strip_tags($value);
        $value = htmlspecialchars($value);

        return $value;
    }
}