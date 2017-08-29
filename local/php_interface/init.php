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

/*Автоматическое подключение классов*/
\Bitrix\Main\Loader::registerAutoLoadClasses(
    null,
    [
        'UW\Services' => '/local/libs/Services.php',
        'UW\IbCodes' => '/local/libs/IbCodes.php'
    ]
);

function gG($var, $mode = 0, $str = 'Var', $die = 0)
{
    switch ($mode) {
        case 0:
            echo "<pre>";
            echo "######### {$str} ##########<br/>";
            print_r($var);
            echo "</pre>";
            if ($die) {
                die();
            }
            break;
        case 2:
            $handle = fopen($_SERVER["DOCUMENT_ROOT"] . "/upload/debug.txt", "a+");
            fwrite($handle, "######### {$str} ##########\n");
            fwrite($handle, (string)$var);
            fwrite($handle, "\n\n\n");

            fclose($handle);
            break;
    }
}

// отписка от рассылки
AddEventHandler("subscribe", "BeforePostingSendMail", array("UW\\Services", "BeforePostingSendMailHandler"));

AddEventHandler("iblock", "OnBeforeIBlockElementAdd",   array("UW\\Services", "replaceName"));
AddEventHandler("iblock", "OnBeforeIBlockElementUpdate",   array("UW\\Services", "replaceName"));