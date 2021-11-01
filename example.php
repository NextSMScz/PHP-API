<?php

require_once "nextsmsAPI.php";

$nextsms = new nextsmsAPI('Váš API Auth Token');
try {
	$nextsms->sendSMS('+4201213456789', 'Example SMS');
	echo "Zpráva byla úspěšně odeslána.";
} catch (nextsmsAPIException $ex) {
	echo "Nastala chyba: ".$ex->getMessage();
}