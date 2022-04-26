<?php

class DataValidation
{
	public function verifyRequiredParams($required_params, $request, $response)
	{
		$error = false;
		$error_params = '';
		$request_params = $request->getParsedBody();
		foreach ($required_params as $param) {
			if (!isset($request_params[$param]) || strlen($request_params[$param]) <= 0) {
				$error = true;
				$error_params .= $param . ', ';
			}
		}
		if ($error) {
			$error_detail = array();
			$error_detail['status'] = 0;
			$error_detail['message'] = 'Required parameters ' . substr($error_params, 0, -2) . ' are missing or empty';
			$response->write(json_encode($error_detail));
		}
		return $error;
	}

	public function validate_authentication_api($authorization_api_token , $response)
	{
		$message = array();
		if (!empty($authorization_api_token)) {
			if ($authorization_api_token == AUTH_API_TOKEN || $authorization_api_token === AUTH_MERCHANT_API_TOKEN ) {

				return true;
			}
			else {
				$message['status'] = -1;
				$message['message'] = 'Invalid API Authorization Token ';
				$message['authorization_api'] = $authorization_api_token;
				$response->write(json_encode($message));

				return false;
			}
		}
		else {
			$message['status'] = -1;
			$message['message'] = 'Invalid API Authorization Token';
			$message['authorization_api'] = $authorization_api_token;
			$response->write(json_encode($message));

			return false;
		}
	}
}