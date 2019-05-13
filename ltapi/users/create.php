<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../config/database.php';
 
// instantiate users object
include_once '../objects/users.php';
 
$database = new Database();
$db = $database->getConnection();
 
$user = new Users($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// make sure data is not empty
if(
    !empty($data->userName) &&
    !empty($data->userPassword) &&
    !empty($data->userEmailId) &&
    !empty($data->userMobileNo) &&
    !empty($data->userGeoLocation)
){
 
    // set product property values
    $user->userName = $data->userName;
    $user->userPassword = $data->userPassword;
    $user->userEmailId = $data->userEmailId;
    $user->userMobileNo = $data->userMobileNo;
    $user->userGeoLocation = $data->userGeoLocation;
 
    // create the product
    if($user->create()){
 
        // set response code - 201 created
        http_response_code(201);
 
        // tell the user
        echo json_encode(array("message" => "User was registered."));
        // echo json_encode(array("message" => $track->create()));
    }
 
    // if unable to create the product, tell the user
    else{
 
        // set response code - 503 service unavailable
        http_response_code(503);
 
        // tell the user
        echo json_encode(array("message" => "Unable to register user."));
    }
}
 
// tell the user data is incomplete
else{
 
    // set response code - 400 bad request
    http_response_code(400);
 
    // tell the user
    echo json_encode(array("message" => "Unable to register user. Data is incomplete."));
}
?>