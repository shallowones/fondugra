<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

class CMapList extends CBitrixComponent
{
    private function getList($codeIb)
    {
        $result = [];

        $arIb = CIBlock::GetList(
            ['id' => 'asc'],
            ['CODE' => $codeIb],
            false
        )->Fetch();

        $rsEl = CIBlockElement::GetList(
            ['id' => 'asc'],
            [
                'IBLOCK_ID' => $arIb['ID'],
                'ACTIVE' => 'Y'
            ],
            false,
            false,
            ['IBLOCK_ID', 'ID', 'NAME']
        );

        $projectIb = 0;
        $projectsId = [];
        while ($obEl = $rsEl->GetNextElement()) {
            $arEl = $obEl->GetFields();
            $arEl['props'] = $obEl->GetProperties();
            $result[$arEl['ID']] = [
                'name' => $arEl['NAME'],
                'coordinate_x' => $arEl['props']['coordinate_x']['VALUE'],
                'coordinate_y' => $arEl['props']['coordinate_y']['VALUE'],
                'touch_coordinate_x' => $arEl['props']['touch_coordinate_x']['VALUE'],
                'touch_coordinate_y' => $arEl['props']['touch_coordinate_y']['VALUE'],
                'city_coordinate_x' => $arEl['props']['city_coordinate_x']['VALUE'],
                'city_coordinate_y' => $arEl['props']['city_coordinate_y']['VALUE'],
                'projects' => array_flip($arEl['props']['projects']['VALUE'])
            ];
            if (is_array($arEl['props']['projects']['VALUE'])) {
                foreach ($arEl['props']['projects']['VALUE'] as $id) {
                    $projectsId[] = $id;
                }
            }

            $projectIb = $arEl['props']['projects']['LINK_IBLOCK_ID'];
        }

        $arProjects = [];
        if (count($projectsId) > 0 && $projectIb > 0) {
            $projectsId = array_unique($projectsId);
            $rsProjects = CIBlockElement::GetList(
                ['id' => 'asc'],
                [
                    'IBLOCK_ID' => $projectIb,
                    'ID' => $projectsId
                ],
                false,
                false,
                ['IBLOCK_ID', 'ID', 'NAME', 'PROPERTY_link_map']
            );
            while ($arProject = $rsProjects->GetNext()) {
                $arProjects[$arProject['ID']] = [
                    'name' => $arProject['NAME'],
                    'link_map' => $arProject['PROPERTY_LINK_MAP_VALUE']
                ];
            }
        }

        if (count($arProjects) > 0) {
            foreach ($result as $key => $item) {
                foreach ($item['projects'] as $idProject => $itemProject) {
                    if (array_key_exists($idProject, $arProjects)) {
                        $result[$key]['projects'][$idProject] = $arProjects[$idProject];
                    }
                }
            }
        }

        return $result;
    }

    public function executeComponent()
    {
        Bitrix\Main\Loader::includeModule('iblock');

        $city = $this->getList('map_city');
        $region = $this->getList('map_region');
        $this->arResult['list'] = array_merge($city, $region);
        $this->IncludeComponentTemplate();
    }
}