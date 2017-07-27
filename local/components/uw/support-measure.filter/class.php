<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

class CSupportMeasureFilterComponent extends CBitrixComponent
{
    protected function getDirectory($code, $key)
    {
        $rsFormsSupport = CIBlockElement::GetList(
            ['SORT' => 'ASC'],
            [
                'IBLOCK_CODE' => $code,
                'ACTIVE' => 'Y'
            ],
            false,
            false,
            ['ID', 'NAME', 'PREVIEW_TEXT']
        );

        while ($arFormSupport = $rsFormsSupport->GetNext()) {
            $this->arResult[$key][] = [
                'id' => $arFormSupport['ID'],
                'name' => strlen(trim($arFormSupport['PREVIEW_TEXT'])) > 0 ?
                    trim($arFormSupport['PREVIEW_TEXT']) : trim($arFormSupport['NAME'])
            ];
        }

        return $this;
    }

    protected function getTypeSupport()
    {
        $arInfoBlock = CIBlock::GetList([], ['CODE' => 'support_measures'], false)->GetNext();
        $rsTypeSupport = CIBlockPropertyEnum::GetList(['SORT' => 'ASC'],
            ['IBLOCK_ID' => $arInfoBlock['ID'], 'CODE' => 'type_support']);
        while ($arTypeSupport = $rsTypeSupport->GetNext()) {
            $this->arResult['typeSupport'][] = [
                'id' => $arTypeSupport['ID'],
                'name' => $arTypeSupport['VALUE']
            ];
        }

        return $this;
    }

    protected function redirect()
    {
        global $APPLICATION;
        LocalRedirect($APPLICATION->GetCurPageParam(''));
    }

    protected function setItemFilter($request, $codeProp, $key)
    {
        if (count($request[$key]) > 0) {
            if (count($request[$key]) > 1) {
                $_SESSION['resultSupportFilter'][0]['LOGIC'] = 'OR';
                foreach ($request[$key] as $value) {
                    $_SESSION['resultSupportFilter'][0][] = [
                        'PROPERTY_' . $codeProp => $value
                    ];
                }
            } else {
                $_SESSION['resultSupportFilter']['PROPERTY_' . $codeProp] = $request[$key][0];
            }
            $_SESSION['restoreSupportFilter'][$key] = $request[$key];
        }
    }

    protected function setFilter($request)
    {
        $_SESSION['resultSupportFilter'] = [];
        $_SESSION['restoreSupportFilter'] = [];

        $this->setItemFilter($request, 'form_support', 'formsSupport');
        $this->setItemFilter($request, 'segment', 'segments');
        $this->setItemFilter($request, 'type_support', 'typeSupport');

        $this->redirect();
    }

    protected function clearFilter()
    {
        $_SESSION['resultSupportFilter'] = '';
        $_SESSION['restoreSupportFilter'] = '';
        $this->redirect();
    }

    function executeComponent()
    {
        \Bitrix\Main\Loader::includeModule('iblock');

        $request = $this->request->toArray();

        if ($this->request->isPost()) {
            if (strlen($request['setFilter']) > 0) {
                $this->setFilter($request);
            }
            if (strlen($request['clearFilter']) > 0) {
                $this->clearFilter();
            }
        } else {
            $this->arResult['resultSupportFilter'] = $_SESSION['resultSupportFilter'];
            $this->arResult['restoreSupportFilter'] = $_SESSION['restoreSupportFilter'];
        }

        $this
            ->getDirectory('forms_support', 'formsSupport')
            ->getDirectory('segments', 'segments')
            ->getTypeSupport()
            ->includeComponentTemplate();

        return $this->arResult['resultSupportFilter'];
    }
}