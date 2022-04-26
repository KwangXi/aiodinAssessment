<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;

require '../vendor/autoload.php';

require '../includes/Aiodin.php';
require '../includes/DataValidation.php';

$app = new App([
	'settings' => [
		'displayErrorDetails' => true
	]
]);

$app->post('/aiodinAssessment/question3', function (Request $request, Response $response) {
	$aiodin = new Aiodin();
	$data_validation = new DataValidation;


	if (!$data_validation->verifyRequiredParams(array('name', 'gender','mathScore','scienceScore'), $request, $response)) {
		//get the information
		$request_data = $request->getParsedBody();

		$aiodin->question3($request_data, $response);
		return $response
			->withHeader('Content-type', 'application/json')
			->withStatus(200);
	}

	return $response
		->withHeader('Content-type', 'application/json')
		->withStatus(200);
});
$app->run();
?>