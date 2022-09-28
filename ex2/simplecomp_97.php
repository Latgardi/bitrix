<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Простой компонент 97");
?><?$APPLICATION->IncludeComponent(
	"ex2:simplecomp.exam_97",
	"",
	Array(
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"NEWS_AUTHOR_PROP_CODE" => "AUTHOR",
		"NEWS_IBLOCK_ID" => "1",
		"USER_AUTHOR_TYPE_PROP_CODE" => "UF_AUTHOR_TYPE"
	)
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>