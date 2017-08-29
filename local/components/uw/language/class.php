<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)  die();

class CUwLanguage extends CBitrixComponent
{
    private function getReplacedString()
    {
        $isEn = \UW\Services::isEngVersion();

        global $APPLICATION;
        $replacedStr = str_replace('/en/', '/', $APPLICATION->GetCurPageParam());

        if (!$isEn) {
            $replacedStr = '/en' . $replacedStr;
        }
        if (!file_exists(\Bitrix\Main\Application::getDocumentRoot() . $replacedStr)) {
            $replacedStr = ($isEn) ? '/' : '/en/';
        }

        return $replacedStr;
    }

    private function getData()
    {
        $result = [
            'RU' => '',
            'EN' => ''
        ];
        $key = (!\UW\Services::isEngVersion()) ? 'EN' : 'RU';
        $result[$key] = self::getReplacedString();
        $this->arResult['langs'] = $result;

        return $this;
    }

    public function executeComponent()
    {
        $this
            ->getData()
            ->IncludeComponentTemplate();
    }
}