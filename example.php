<?php

//Připojení knihovny do kódu
require_once "nextsmsAPI.php";

//Odeslání SMS ze systémového čísla
$nextsms = new nextsmsAPI('Váš API Auth Token');
try {
	$nextsms->sendSMS('+420123456789', 'První API SMS ', 'system', '');
	echo "Zpráva byla úspěšně odeslána.";
} catch (nextsmsAPIException $ex) {
	echo "Nastala chyba: ".$ex->getMessage();
}

//Odeslání SMS z Short code
$nextsms = new nextsmsAPI('Váš API Auth Token');
try {
	$nextsms->sendSMS('+420123456789', 'První API SMS ', 'short', '');
	echo "Zpráva byla úspěšně odeslána.";
} catch (nextsmsAPIException $ex) {
	echo "Nastala chyba: ".$ex->getMessage();
}

//Odeslání SMS z textového odesílatele
$nextsms = new nextsmsAPI('Váš API Auth Token');
try {
	$nextsms->sendSMS('+420123456789', 'První API SMS ', 'text', 'NextSMS.cz');
	echo "Zpráva byla úspěšně odeslána.";
} catch (nextsmsAPIException $ex) {
	echo "Nastala chyba: ".$ex->getMessage();
}

//Odeslání SMS z vlastního čísla - je potřeba ověření čísla, v případě zájmů nás kontaktujte na info@nextsms.cz
$nextsms = new nextsmsAPI('Váš API Auth Token');
try {
	$nextsms->sendSMS('+420123456789', 'První API SMS ', 'own', '+420987654321');
	echo "Zpráva byla úspěšně odeslána.";
} catch (nextsmsAPIException $ex) {
	echo "Nastala chyba: ".$ex->getMessage();
}