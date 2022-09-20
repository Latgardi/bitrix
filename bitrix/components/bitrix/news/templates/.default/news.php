<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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











<?if($arParams["USE_RSS"]=="Y"):?>
	<?
	if(method_exists($APPLICATION, 'addheadstring'))
		$APPLICATION->AddHeadString('<link rel="alternate" type="application/rss+xml" title="'.$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["rss"].'" href="'.$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["rss"].'" />');
	?>
	<a href="&lt;?=$arResult[">" data-bx-app-ex-href="<?=$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["rss"]?>" title="rss" target="_self"&gt;<img alt="RSS" src="<?=$templateFolder?>/images/gif-light/feed-icon-16x16.gif" border="0" align="right"></a>
<?endif?>

<?if($arParams["USE_SEARCH"]=="Y"):?>
<?=GetMessage("SEARCH_LABEL")?><?$APPLICATION->IncludeComponent(
	"bitrix:search.form",
	"flat",
	Array(
		"PAGE" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["search"]
	),
$component
);?>
<br>
<?endif?>
<?if($arParams["USE_FILTER"]=="Y"):?>
<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.filter",
	"",
	Array(
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"FIELD_CODE" => $arParams["FILTER_FIELD_CODE"],
		"FILTER_NAME" => $arParams["FILTER_NAME"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
		"PROPERTY_CODE" => $arParams["FILTER_PROPERTY_CODE"]
	),
$component
);?>
<br>
<?endif?>










<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"",
	Array(
		"ACTIVE_DATE_FORMAT" => $arParams["LIST_ACTIVE_DATE_FORMAT"],
		"CACHE_FILTER" => $arParams["CACHE_FILTER"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CHECK_DATES" => $arParams["CHECK_DATES"],
		"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
		"DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
		"DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
		"DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
		"DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
		"DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
		"FIELD_CODE" => $arParams["LIST_FIELD_CODE"],
		"FILE_404" => $arParams["FILE_404"],
		"FILTER_NAME" => $arParams["FILTER_NAME"],
		"GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
		"HIDE_LINK_WHEN_NO_DETAIL" => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
		"INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
		"MESSAGE_404" => $arParams["MESSAGE_404"],
		"NEWS_COUNT" => $arParams["NEWS_COUNT"],
		"PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
		"PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
		"PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
		"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
		"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
		"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
		"PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
		"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
		"PAGER_TITLE" => $arParams["PAGER_TITLE"],
		"PREVIEW_TRUNCATE_LEN" => $arParams["PREVIEW_TRUNCATE_LEN"],
		"PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
		"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
		"SET_STATUS_404" => $arParams["SET_STATUS_404"],
		"SET_TITLE" => $arParams["SET_TITLE"],
		"SHOW_404" => $arParams["SHOW_404"],
		"SORT_BY1" => $arParams["SORT_BY1"],
		"SORT_BY2" => $arParams["SORT_BY2"],
		"SORT_ORDER1" => $arParams["SORT_ORDER1"],
		"SORT_ORDER2" => $arParams["SORT_ORDER2"],
		"SPECIAL_DATE" => $arParams["SPECIAL_DATE"],
		"USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"]
	),
$component
);?>