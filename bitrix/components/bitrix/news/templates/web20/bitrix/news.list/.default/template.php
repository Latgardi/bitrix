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


<?if ($arParams["SPECIAL_DATE"] == "Y") {
	$property = $arResult["ITEMS"][0]["DISPLAY_ACTIVE_FROM"];
	$APPLICATION->setPageProperty("specialdate", $property);
}?>





<div class="news-list">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br>
<?endif;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<p class="news-item" id="<span id=" title="Код PHP: &lt;?=$this-&gt;GetEditAreaId($arItem['ID']);?&gt;"><?=$this->GetEditAreaId($arItem['ID']);?><span class="bxhtmled-surrogate-inner"><span class="bxhtmled-right-side-item-icon"></span><span class="bxhtmled-comp-lable" unselectable="on" spellcheck="false">Код PHP</span></span>"&gt;
		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>

			<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
				<a href="&lt;?=$arItem[">" data-bx-app-ex-href="<?=$arItem["DETAIL_PAGE_URL"]?>"&gt;<img src="&lt;?=$arItem[" class="preview_picture" border="0">" data-bx-app-ex-src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
						width="" data-bx-app-ex-width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
						height="" data-bx-app-ex-height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
						alt="" data-bx-app-ex-alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
						title="&lt;span id="bxid118540978" title="Код PHP: &lt;?=$arItem["PREVIEW_PICTURE"]["TITLE"]?&gt;" class="bxhtmled-surrogate"&gt;<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?><span class="bxhtmled-surrogate-inner"><span class="bxhtmled-right-side-item-icon"></span><span class="bxhtmled-comp-lable" unselectable="on" spellcheck="false">Код PHP</span></span>"
						style="float:left"
						/&gt;</a>
			<?else:?>
				<img src="&lt;?=$arItem[" class="preview_picture" border="0">" data-bx-app-ex-src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
					width="" data-bx-app-ex-width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
					height="" data-bx-app-ex-height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
					alt="" data-bx-app-ex-alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
					title="&lt;span id="bxid946600147" title="Код PHP: &lt;?=$arItem["PREVIEW_PICTURE"]["TITLE"]?&gt;" class="bxhtmled-surrogate"&gt;<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?><span class="bxhtmled-surrogate-inner"><span class="bxhtmled-right-side-item-icon"></span><span class="bxhtmled-comp-lable" unselectable="on" spellcheck="false">Код PHP</span></span>"
					style="float:left"
					/&gt;
			<?endif;?>
		<?endif?>
		<?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
			<span class="news-date-time"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></span>
		<?endif?>
		<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
			<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
				<a href="&lt;?echo $arItem[">" data-bx-app-ex-href="<?echo $arItem["DETAIL_PAGE_URL"]?>"&gt;<b><?echo $arItem["NAME"]?></b></a><br>
			<?else:?>
				<b><?echo $arItem["NAME"]?></b><br>
			<?endif;?>
		<?endif;?>
		<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
			<?echo $arItem["PREVIEW_TEXT"];?>
		<?endif;?>
		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
			</p><div style="clear:both"></div>
		<?endif?>
		<?foreach($arItem["FIELDS"] as $code=>$value):?>
			<small>
			<?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?=$value;?>
			</small><br>
		<?endforeach;?>
		<?foreach($arItem["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
			<small>
			<?=$arProperty["NAME"]?>:&nbsp;
			<?if(is_array($arProperty["DISPLAY_VALUE"])):?>
				<?=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
			<?else:?>
				<?=$arProperty["DISPLAY_VALUE"];?>
			<?endif?>
			</small><br>
		<?endforeach;?>
		<?if($arParams["USE_RATING"]=="Y"):
			$parent = $component->GetParent();
		?>
		<?$APPLICATION->IncludeComponent(
	"bitrix:iblock.vote",
	"ajax",
	Array(
		"CACHE_TIME" => $parent->arParams["CACHE_TIME"],
		"CACHE_TYPE" => $parent->arParams["CACHE_TYPE"],
		"DISPLAY_AS_RATING" => $parent->arParams["DISPLAY_AS_RATING"],
		"ELEMENT_ID" => $arItem["ID"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"MAX_VOTE" => $arParams["MAX_VOTE"],
		"VOTE_NAMES" => $arParams["VOTE_NAMES"]
	),
$component
);?>
		<?endif?>
	<p></p>
<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div><br>