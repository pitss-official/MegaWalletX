<?php
namespace System;

class FileParser{
    public static function parseEquals($fileName, $delimiter){
        $file = fopen($fileName, 'r');
        if (!$file)die('Error :: EOF_XCP');
        $data = [];
        while (!feof($file)) {
            $str= fgets($file);
            if( !stripos($str,'='))continue;
            $str = explode($delimiter, $str);
            $data[$str[0]] = trim($str[1]);
        }
        return $data;
    }
}