<?php

require_once "nextsmsAPI.php";

$nextsms = new nextsmsAPI('Váš API Auth Token');
try {
	$nextsms->sendSMS('+420123456789', 'První API SMS ', 'text', 'NextSMS.cz');
	echo "Zpráva byla úspěšně odeslána.";
} catch (nextsmsAPIException $ex) {
	echo "Nastala chyba: ".$ex->getMessage();
}