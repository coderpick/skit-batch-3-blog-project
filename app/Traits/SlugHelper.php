<?php


namespace App\Traits;


trait SlugHelper
{
    public function str_slug($string)
    {
        $string = mb_strtolower($string);
        $string = str_replace('?', '', $string);
        $string = str_replace('%', '', $string);
        $string = str_replace('(', '', $string);
        $string = str_replace(')', '', $string);
        $string = str_replace('/', '', $string);
        $string = str_replace('-', '', $string);
        $string = str_replace('&', '', $string);
        $string = preg_replace('/\s+/u', '-', trim($string));
        return $string;
    }
    public static function str_limit($string, $limit = 20)
    {
        $string = $string . ' ';
        $string = substr($string, 0, $limit);
        $string = substr($string, 0, strripos($string, " "));
        $string = $string . '...';
        return $string;
    }
}
