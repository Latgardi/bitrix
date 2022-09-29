<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Простой компонент");
?><?$APPLICATION->IncludeComponent(
	"ex2:simplecomp.exam_71",
	"",
	Array(
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"DETAIL_LINK_TEMPLATE" => "детальный просмотр",
		"FIRMS_IBLOCK_ID" => "7",
		"PAGE_SIZE" => "5",
		"PRODUCTS_IBLOCK_ID" => "2",
		"PRODUCT_PROPERTY" => "FIRM"
	)
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>