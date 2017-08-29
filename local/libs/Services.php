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

    /**
     * @param $bytes
     * @param int $precision
     * @return string
     */
    public static function FBytes($bytes, $precision = 2)
    {
        $units = array('байт', 'кб', 'мб', 'гб', 'тб');
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
        $bytes /= pow(1024, $pow);
        return round($bytes, $precision) . ' ' . $units[$pow];
    }

    /**
     * @param $arFields
     */
    public static function replaceName(&$arFields)
    {
        \Bitrix\Main\Loader::includeModule('iblock');

        $arInfoBlock = \CIBlock::GetList([], ['CODE' => 'links'], false)->GetNext();
        if (intvaL($arFields["IBLOCK_ID"]) === intval($arInfoBlock['ID'])) {
            $arFields["NAME"] = TruncateText(strip_tags($arFields["PREVIEW_TEXT"]), 254);
        }
    }

    /**
     * Метод проверяет текущую языковую версию сайта
     * @return bool
     */
    public static function isEngVersion()
    {
        return (LANGUAGE_ID === 'en');
    }

    /**
     * Возвращает идентификатор инфоблока по символьному коду
     * @param $code
     * @return bool
     */
    public static function getIbIdByCode($code)
    {
        \Bitrix\Main\Loader::includeModule('iblock');

        $rs = \CIBlock::GetList(
            [],
            ['ACTIVE' => 'Y', 'CODE' => $code],
            false
        );
        return ($result = $rs->Fetch()) ? $result['ID'] : false;
    }
}