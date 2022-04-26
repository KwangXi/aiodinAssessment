<?php

class Aiodin
{
	private $con;

	//inside constructor
	//we are getting the instances link
	function __construct()
	{
		require_once dirname(__FILE__) . '/DbConnect.php';
		//open Db Connection
		$db = new DbConnect;
		$this->con = $db->connect();
	}

	/**
	 * Question 3
	 */

	public function question3($result_summary, $response)
	{
		$mathScore = $result_summary['mathScore'];
		$scienceScore = $result_summary['scienceScore'];
		$name = $result_summary['name'];
		$gender = $result_summary['gender'];
		$message = array();
		if($gender === 'Male' || $gender === 'male'){
			$gender = 'he';
		}else if($gender === 'Female' || $gender === 'female'){
			$gender = 'she';
		}
		if(is_numeric($mathScore) && is_numeric($scienceScore)){
			$averageScore = ($mathScore + $scienceScore)/2;
			if($mathScore >= 50 && $scienceScore >= 50){

				$result = $name . ' has an average score of ' . $averageScore . ' from this test. Overall, ' . $gender . ' is performing very well in this test';
				$message['status'] = 'Success';
				$message['message'] = $result;
				$response->write(json_encode($message));
			}
			else if($scienceScore < 50 && $mathScore < 50 ){
				$result = $name . ' has an average score of ' . $averageScore . ' from this test. Overall, ' . $gender . ' is not doing well for the Mathematics and Science subject';
				$message['status'] = 'Success';
				$message['message'] = $result;
				$response->write(json_encode($message));
			}
			else if($mathScore < 50){
				$result = $name . ' has an average score of ' . $averageScore . ' from this test. Overall, ' . $gender . ' is not doing well for the Mathematics subject';
				$message['status'] = 'Success';
				$message['message'] = $result;
				$response->write(json_encode($message));
			}
			else if($scienceScore < 50){
				$result = $name . ' has an average score of ' . $averageScore . ' from this test. Overall, ' . $gender . ' is not doing well for the Science subject';
				$message['status'] = 'Success';
				$message['message'] = $result;
				$response->write(json_encode($message));
			}

		}
		else{
			$message['status'] = 'Fail to generate';
			$message['message'] = 'Score must be in numbers';
			$response->write(json_encode($message));
		}
	}



}