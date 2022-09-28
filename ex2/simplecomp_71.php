<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Простой компонент 71");
?><?$APPLICATION->IncludeComponent(
	"ex2:simplecomp.exam_71",
	"",
Array()
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>