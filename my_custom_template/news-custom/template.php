<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

// Define the paths to the first 3 images
$imagePaths = [
    $templateFolder . "/images/article-item-bg-1.jpg",
    $templateFolder . "/images/article-item-bg-2.jpg",
    $templateFolder . "/images/article-item-bg-3.jpg"
];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Your Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link rel="shortcut icon" href="<?= $templateFolder ?>/images/favicon.ico" type="image/x-icon">
    <link href="<?= $templateFolder ?>/css/common.css" rel="stylesheet">
</head>
<body>
<div id="barba-wrapper">
    <div class="article-list">

        <?php foreach ($arResult["ITEMS"] as $index => $arItem): ?>
            <a class="article-item article-list__item" href="<?= $arItem["DETAIL_PAGE_URL"] ?>" data-anim="anim-3">
                <div class="article-item__background">
                    <?php 
                    // Display one of the first 3 images if available, otherwise use a default
                    if (isset($imagePaths[$index])): ?>
                        <img src="<?= $imagePaths[$index] ?>" alt="<?= $arItem["NAME"] ?>" />
                    <?php elseif ($arItem["PREVIEW_PICTURE"]["SRC"]): ?>
                        <img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" alt="<?= $arItem["NAME"] ?>" />
                    <?php else: ?>
                        <img src="<?= $templateFolder ?>/images/default-image.jpg" alt="Default Image" />
                    <?php endif; ?>
                </div>
                <div class="article-item__wrapper">
                    <!-- Title with larger font size and bold styling -->
                    <div class="article-item__title" style="font-size: 1.5em; font-weight: bold;"><?= $arItem["NAME"] ?></div>
                    
                    <!-- Body content with smaller font size -->
                    <div class="article-item__content" style="font-size: 1em;"><?= $arItem["PREVIEW_TEXT"] ?></div>
                </div>
            </a>
        <?php endforeach; ?>

    </div>
</div>
</body>
</html>
