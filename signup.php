<?php

global $name;
global $age;
global $password;

$server_name="localhost";
$username="root";
$password="";
$db_name="test";

$conn=new mysqli($server_name,$username,$password,$db_name);


$response = array();


if($_POST['name'] && $_POST['age'] && $_POST['password']){
    
    $name = $_POST['name'];
    $age = $_POST['age'];
    $password = $_POST['password'];
    
    $stmt = $conn->prepare("INSERT INTO `users`(`name`, `age`, `password`) VALUES (?,?,?)");
    $stmt->bind_param("sss",$name,$age,$password);
// on below line we are checking if our sql query is executed successfully.
if($stmt->execute() == TRUE){
        // if the script is executed successfully we are
        // passing data to our response object
        // with a success message.
        $response['error'] = false;
        $response['message'] = "created successfully!";
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