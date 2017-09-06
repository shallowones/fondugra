<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
AddEventHandler('iblock', 'OnAfterIBlockElementAdd', ['CropImgVideo', 'CropImgVideoHandler']);
AddEventHandler('iblock', 'OnAfterIBlockElementUpdate', ['CropImgVideo', 'CropImgVideoHandler']);

use Bitrix\Main\Application;

class CropImgVideo
{
    const IMG_WIDTH = 300;
    const IMG_HEIGHT = 200;

    function CropImgVideoHandler(&$arFields)
    {
        $ibId = \UW\Services::getIbIdByCode(\UW\IBCodes::IB_CODE_MEDIA);

        if (intval($arFields['IBLOCK_ID']) !== intval($ibId))
            return true;

        $properties = \CIBlockElement::GetProperty(
            $ibId,
            $arFields['ID'],
            ['sort' => 'asc']
        );
        $props = [];
        while ($prop = $properties->Fetch()) {
            $props[$prop['CODE']] = $prop['VALUE'];
        }

        if (!empty($props['PICTURE']) && !empty($props['LINK']))
            return true;

        $properties = \CIBlockElement::GetProperty(
            $ibId,
            $arFields['ID'],
            ['sort' => 'asc'],
            ['CODE' => 'LINK']
        )->Fetch();

        preg_match('#(\.be/|/embed/|/v/|/watch\?v=)([A-Za-z0-9_-]{5,11})#', $properties['VALUE'], $matches);
        $image = \CFile::MakeFileArray('http://img.youtube.com/vi/' . $matches[2] . '/0.jpg');
        $fid = \CFile::SaveFile($image, 'tmp_img');
        $imageResize = \UW\Services::getResizeImage($fid, self::IMG_WIDTH, self::IMG_HEIGHT);

        $arFiles[] = [
            'VALUE' => CFile::MakeFileArray(Application::getDocumentRoot() . $imageResize),
            'DESCRIPTION' => ''
        ];

        \CIBlockElement::SetPropertyValuesEx(
            $arFields['ID'],
            $ibId,
            ['PICTURE' => $arFiles]
        );

        return true;
    }
}