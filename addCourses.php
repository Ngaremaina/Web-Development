<?php

global $courseName;
global $courseDuration;
global $courseDescription;
require "connection.php";
// an array to display response
$response = array();
// on below line we are checking if the body provided by user contains
// this keys as course name,course description and course duration


if($_POST['courseName'] && $_POST['courseDuration'] && $_POST['courseDescription']){
	// if above three parameters are present then we are extravting values
	// from it and storing it in new variables.
	$courseName = $_POST['courseName'];
	$courseDuration = $_POST['courseDuration'];
	$courseDescription = $_POST['courseDescription'];
	// after that we are writing an sql query to
	// add this data to our database.
	// on below line make sure to add your table name
	// in previous article we have created our table name
	// as courseDb and add all column headers to it except our id.
	$stmt = $conn->prepare("INSERT INTO `coursedb`(`courseName`, `courseDuration`, `courseDescription`) VALUES (?,?,?)");
	$stmt->bind_param("sss",$courseName,$courseDuration,$courseDescription);
// on below line we are checking if our sql query is executed successfully.
if($stmt->execute() == TRUE){
		// if the script is executed successfully we are
		// passing data to our response object
		// with a success message.
		$response['error'] = false;
		$response['message'] = "course created successfully!";
	} else{
		// if we get any error we are passing error to our object.
		$response['error'] = true;
		$response['message'] = "failed\n ".$conn->error;
	}
} else{
	// this msethod is called when user
	// donot enter sufficient parameters.
	$response['error'] = true;
	$response['message'] = "Insufficient parameters";
}
// at last we are prinintg our response which we get.
echo json_encode($response);
?>
