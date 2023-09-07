<?php

header("content-type:application/json");
header("Access-Control-Allow-Method:GET");
header("Access-Control-Allow-Origin:*");

// validating the incoming request 

	if (isset($_GET['slack_name']) && $_GET['slack_name'] !== "" && isset($_GET['track']) && $_GET['track'] !== "") {
		response($_GET['slack_name'], $_GET['track'], 200,"user information retrieved successfully");	
	}else{
		response(NULL, NULL, 400,"Invalid Request");
	}



// response message 
function response($slack_name, $track, $response_code, $response_message) 
{
	$response;
	$date = date('y-m-d');
	 $dayOfWeek = date('l', strtotime($date));

	if ($response_code === 200) {
		$response['slack_name'] = $slack_name;
		$response['current_day'] = $dayOfWeek;
		$response['utc_time'] =  date("Y-m-d H:i:s", time());
		$response['track'] =  $track;
		$response['github_file_url'] =  "https://github.com/emekaenyinnia/HNGx-stage-one/blob/main/api/index.php";
		$response['github_repo_url'] =  "https://github.com/emekaenyinnia/HNGx-stage-one";
		$response['status_code'] =  $response_code;
		$response['message'] =  $response_message;
	} else{
		$response['status_code'] =  $response_code;
		$response['message'] =  $response_message;
	}

	$json_response = json_encode($response);
	echo $json_response;
	return $json_response;
}


?>



