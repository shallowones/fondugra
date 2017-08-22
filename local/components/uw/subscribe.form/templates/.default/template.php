<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
} ?>
<? // form?>
<? if (
($_SESSION['SEND_SUBSCRIBE_CONFIRM'])
): ?>
    <p style='color:green;'>
        <?= $_SESSION['SEND_SUBSCRIBE_CONFIRM'] ?>
    </p>
    <? $_SESSION['SEND_SUBSCRIBE_CONFIRM'] = 0; ?>
<? else: ?>

    <? // Вывод сообщение об успешной подписке?>
    <? if ($_SESSION['SEND_SUBSCRIBE_OK']): ?>
        <p style='color:green;'>На указанный в форме E-MAIL отправлено письмо с ссылкой для подтверждения подписки.</p>
        <? $_SESSION['SEND_SUBSCRIBE_OK'] = 0; ?>
    <? endif; ?>
<div class="mess">
    <div class="mess-wrap">
        <div class="mess-left">Подпишитесь<br>на новостную рассылку</div>
    <? // Вывод формы для подписки?>
    <form class="mess-right" action="<?= POST_FORM_ACTION_URI ?>" method="post">

            <label class="mess__label" for="email">E-mail:</label>
        <? // Вывод ошибок, если есть
        if (count($arResult["Error"]) > 0): ?>
            <input class="mess__input" style="border-color: #f24f18;" type="text" size="30" <? if (strpos($arResult["Error"][0], 'E-MAIL')){ ?>
                   <? } ?>name="subscribe-email" value="<?= $arResult["subscribe-email"] ?>">
            <?else:?>
            <input class="mess__input" type="text" size="30" <? if (strpos($arResult["Error"][0], 'E-MAIL')){ ?>
                   <? } ?>name="subscribe-email" value="<?= $arResult["subscribe-email"] ?>">
            <?endif;?>
        <!--        <div class="s-col">-->
        <!--            <label for="rubric">Рубрики: <span class="req">*</span></label>-->
        <!--            <select name="subscribe-rubric[]" id="rubric" multiple>-->
        <!--                --><? // foreach ($arResult["RUBRIC_LIST"] as $arRubric) { ?>
        <!--                    <option value="--><? //= $arRubric['ID'] ?><!--" --><? // if (in_array($arRubric['ID'],
        //                        $arResult["'subscribe-rubric"])) {
        //                        echo 'selected="selected"';
        //                    } ?>
        <!--                    >--><? //= $arRubric['NAME'] ?><!--</option>-->
        <!--                --><? // } ?>
        <!--            </select>-->
        <!--        </div>-->

        <div style="display: none">
            <label for="rubric">Рубрики: <span class="req">*</span></label>
            <? foreach ($arResult["RUBRIC_LIST"] as $arRubric): ?>
                <input type="checkbox" name="subscribe-rubric[]" value="<?= $arRubric['ID']?>"
                    checked
                > <?= $arRubric['NAME'] ?><br/>
            <? endforeach; ?>
        </div>
            <input class="button button_yellow" type="submit" name="submit" value="Подписаться">
        <? // Вывод ошибок, если есть
        if (count($arResult["Error"]) > 0): ?>
            <span class="invalid-info"><? echo implode("<br />", $arResult["Error"]); ?></span>
        <? endif; ?>
    </form>
    </div>
</div>

<? endif ?>

