<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

class CEventFilterComponent extends CBitrixComponent
{
    protected function redirect()
    {
        global $APPLICATION;
        LocalRedirect($APPLICATION->GetCurPageParam(''));
    }

    protected function setFilter($request)
    {
        $_SESSION['resultEventsFilter'] = [];
        $_SESSION['restoreEventsFilter'] = [];

        if (strlen(trim($request['date_from'])) > 0 && strlen(trim($request['date_to'])) > 0) {

            $beg = (new DateTime($request['date_from']))->format('Y-m-d') . ' 00:00:00';
            $end = (new DateTime($request['date_to']))->format('Y-m-d') . ' 23:59:59';

            $_SESSION['resultEventsFilter'][] = [
                'LOGIC' => 'OR',
                [
                    '>=PROPERTY_date_from' => $beg,
                    '<=PROPERTY_date_from' => $end,
                ],
                [
                    '>=PROPERTY_date_to' => $beg,
                    '<=PROPERTY_date_to' => $end,
                ],
                [
                    '>=PROPERTY_date_from' => $beg,
                    '<=PROPERTY_date_to' => $end,
                ],
            ];

            /*$_SESSION['resultEventsFilter']['>=PROPERTY_date_from'] = $beg;
            $_SESSION['resultEventsFilter']['<=PROPERTY_date_to'] = $end;*/

            $_SESSION['restoreEventsFilter']['date_from'] = trim($request['date_from']);
            $_SESSION['restoreEventsFilter']['date_to'] = trim($request['date_to']);
        }

        $this->redirect();
    }

    protected function clearFilter()
    {
        $_SESSION['resultEventsFilter'] = '';
        $_SESSION['restoreEventsFilter'] = '';
        $this->redirect();
    }

    function executeComponent()
    {
        $request = $this->request->toArray();

        if ($this->request->isPost()) {
            if (strlen($request['setFilter']) > 0) {
                $this->setFilter($request);
            }
            if (strlen($request['clearFilter']) > 0) {
                $this->clearFilter();
            }
        } else {
            $this->arResult['resultEventsFilter'] = $_SESSION['resultEventsFilter'];
            $this->arResult['restoreEventsFilter'] = $_SESSION['restoreEventsFilter'];
        }

        $this
            ->includeComponentTemplate();

        return $this->arResult['resultEventsFilter'];
    }
}