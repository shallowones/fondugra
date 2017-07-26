<?php
/**
 * Created by PhpStorm.
 * User: Владимир
 * Date: 26.07.2017
 * Time: 14:09
 */
/**
 * Распечатывает массивы
 * @param $var
 * @param int $mode
 * @param string $str
 * @param int $die
 */

function gG($var, $mode = 0, $str = 'Var', $die = 0)
{
    switch($mode){
        case 0:
            echo "<pre>";
            echo "######### {$str} ##########<br/>";
            print_r($var);
            echo "</pre>";
            if($die) die();
            break;
        case 2:
            $handle = fopen($_SERVER["DOCUMENT_ROOT"]."/upload/debug.txt", "a+");
            fwrite($handle, "######### {$str} ##########\n");
            fwrite($handle, (string)$var);
            fwrite($handle, "\n\n\n");

            fclose($handle);
            break;
    }

}