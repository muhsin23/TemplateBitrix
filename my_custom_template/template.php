<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?php
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<div class="news-grid">
    <?php if ($arParams["DISPLAY_TOP_PAGER"]): ?>
        <div class="pagination"><?= $arResult["NAV_STRING"] ?></div>
    <?php endif; ?>

    <?php foreach ($arResult["ITEMS"] as $arItem): ?>
        <?php
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <div class="news-card" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
            <?php if ($arParams["DISPLAY_PICTURE"] != "N" && is_array($arItem["PREVIEW_PICTURE"])): ?>
                <div class="news-card-image">
                    <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>">
                        <img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>"
                             alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>"
                             title="<?= $arItem["PREVIEW_PICTURE"]["TITLE"] ?>">
                    </a>
                </div>
            <?php endif; ?>

            <div class="news-card-content">
                <?php if ($arParams["DISPLAY_NAME"] != "N" && $arItem["NAME"]): ?>
                    <h3 class="news-card-title">
                        <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>"><?= $arItem["NAME"] ?></a>
                    </h3>
                <?php endif; ?>

                <?php if ($arParams["DISPLAY_DATE"] != "N" && $arItem["DISPLAY_ACTIVE_FROM"]): ?>
                    <span class="news-card-date"><?= $arItem["DISPLAY_ACTIVE_FROM"] ?></span>
                <?php endif; ?>

                <?php if ($arParams["DISPLAY_PREVIEW_TEXT"] != "N" && $arItem["PREVIEW_TEXT"]): ?>
                    <p class="news-card-text"><?= $arItem["PREVIEW_TEXT"] ?></p>
                <?php endif; ?>

                <?php if (!empty($arItem["DISPLAY_PROPERTIES"])): ?>
                    <div class="news-card-properties">
                        <?php foreach ($arItem["DISPLAY_PROPERTIES"] as $pid => $arProperty): ?>
                            <span><?= $arProperty["NAME"] ?>: <?= is_array($arProperty["DISPLAY_VALUE"]) ? implode(", ", $arProperty["DISPLAY_VALUE"]) : $arProperty["DISPLAY_VALUE"] ?></span>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>

    <?php if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
        <div class="pagination"><?= $arResult["NAV_STRING"] ?></div>
    <?php endif; ?>
</div>
