<?php
class nextsmsAPIException extends Exception {
	protected $_errorCode;
	public function __construct($message = "", $errorCode = "")
	{
		$this->_errorCode = $errorCode;
		parent::__construct($message);
	}
	public function getErrorCode() {
		return $this->_errorCode;
	}
}
class nextsmsAPI
{
	private $authToken;
	function __construct($authToken)
	{
		$this->authToken = $authToken;
	}
	function sendSMS($number, $message, $sender, $sender_value)
	{
		$ch = curl_init('https://api.nextsms.cz/gate.php?cmd=sendSMS');
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
			"auth_token" => $this->authToken,
			"number" => $number,
			"message" => $message,
			"sender" => $sender,
			"sender_value" => $sender_value
		]));
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch);
		curl_close($ch);
		$output = json_decode($result, true);
		if ($output['success'] == false) {
			throw new nextsmsAPIException($output['error']['message'], $output['error']['code']);
		}
		return $output;
	}
}
?>