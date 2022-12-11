<?php
/* ============================= */
/* ОТПРАВКА ПИСЬМА ЗАКАЗА В TELEGRAM */
/*функция для создания запроса на сервер Telegram */
/* ============================= */
function parser($url){
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$result = curl_exec($curl);
	if($result == false){     
		echo "Ошибка отправки запроса: " . curl_error($curl);
		return false;
	}
	else{
		return true;
	}
}
/* ============================= */
/* ============================= */

/* ============================= */
/* ОТПРАВКА СООБЩЕНИЕ В ТЕЛЕГРАММ */
/* ============================= */
function orderSendTelegram($message) {
	/*токен который выдаётся при регистрации бота */
	$token = "5921841218:AAHb4HAMJ-O1wlANkD1RVHk-a9Agc70_AUo";
	/*идентификатор группы*/
	$chat_id = "-885985674";

	$message = urlencode($message);

	/*делаем запрос*/
	parser("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$message}");
}
/* ============================= */
/* ============================= */

/* ============================= */
/* ОБРАБОТЧИК ДЛЯ ФОРМЫ В НИЖНЕЙ ЧАСТИ ЭКРАНА */
/* ============================= */
if($_POST) {
	$name = htmlspecialchars($_POST["name"]);
	$phone = htmlspecialchars($_POST["phone"]);
	$message = htmlspecialchars($_POST["message"]);

	$textMessage = "СООБЩЕНИЕ ИЗ ФОРМЫ GOLDEN-LINK\n";
	$textMessage .= "Имя:  ".$name."\n";
	$textMessage .= "Телефон:  ".$phone."\n";
	$textMessage .= "Сообщение:  ".$message."\n";
	// orderSendTelegram($textMessage);
}
?>