<?

namespace UW;

class Services
{
    /**
     * Возвращает хэш для отписки
     * @param $email
     * @return string
     */
    function GetMailHash($email)
    {
        return md5(md5($email) . 'svs_khmao_9351048');
    }

    /**
     * Перед отправкой выпуска каждому конкретному подписчику подменяются маски - ID подписки и код, основанный на хеше
     * @param $arFields
     * @return mixed
     */
    function BeforePostingSendMailHandler($arFields)
    {
        \Bitrix\Main\Loader::includeModule('subscribe');

        $rsSub = \CSubscription::GetByEmail($arFields["EMAIL"]);
        $arSub = $rsSub->Fetch();

        $arFields["BODY"] = str_replace("#MAIL_ID#", $arSub["ID"], $arFields["BODY"]);
        $arFields["BODY"] = str_replace("#MAIL_MD5#", self::GetMailHash($arFields["EMAIL"]), $arFields["BODY"]);

        return $arFields;
    }

    public static function FBytes($bytes, $precision = 2) {
        $units = array('байт', 'кб', 'мб', 'гб', 'тб');
        $bytes = max($bytes, 0);
        $pow = floor(($bytes?log($bytes):0)/log(1024));
        $pow = min($pow, count($units)-1);
        $bytes /= pow(1024, $pow);
        return round($bytes, $precision).' '.$units[$pow];
    }
}