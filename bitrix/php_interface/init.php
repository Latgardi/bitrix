<?php
AddEventHandler("iblock", "OnBeforeIBlockElementUpdate", Array("EventHandlers", "deactivateBlockElement"));
AddEventHandler("main", "OnEpilog", Array("EventHandlers", "writeLog404"));
AddEventHandler("main", "OnBeforeEventAdd", Array("EventHandlers", "feedbackFormChangeAuthor"));

class EventHandlers
{
	public function deactivateBlockElement(array &$arFields)
	{
		if ($arFields["IBLOCK_ID"] == 2 && $arFields["ACTIVE"] == "N") {
			$count = $arFields["SHOW_COUNTER"];
			if ($count > 2) {
				global $APPLICATION;
				$APPLICATION->throwException("Товар невозможно деактивировать, у него $count просмотров");
				return false;
			}
		}
	}

	public function writeLog404(): void
	{
		if (defined('ERROR_404')) {
			global $APPLICATION;
			$pageURL = $APPLICATION->GetCurPage();
			CEventLog::Add(array(
				"SEVERITY" => "SECURITY",
				"AUDIT_TYPE_ID" => "ERROR_404",
				"MODULE_ID" => "MAIN",
				"DESCRIPTION" => $pageURL
				));
		}
	}

	public function feedbackFormChangeAuthor(string &$event, string &$lid, array &$arFields): void
	{
		if ($event == "FEEDBACK_FORM") {
			global $USER;
			if (!$USER->isAuthorized()) {
				$author = $arFields["AUTHOR"];
				$author = "Пользователь не авторизован, данные из формы: $author";
				$arFields["AUTHOR"] = $author;
			} else {
				$author = $arFields["AUTHOR"];
				$author = "Пользователь авторизован: {$USER->GetID()} ({$USER->GetLogin()}) {$USER->getFullName()}, данные из формы: $author";
				$arFields["AUTHOR"] = $author;
			}
			CEventLog::Add(array(
				"SEVERITY" => "SECURITY",
				"AUDIT_TYPE_ID" => "CHANGE_MAIL_DATA",
				"MODULE_ID" => "MAIN",
				"DESCRIPTION" => "Замена данных в отсылаемом письме – $author"
			));

		}
	}
}
