<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../config/database.php';
 
// instantiate product object
include_once '../objects/tracks.php';
 
$database = new Database();
$db = $database->getConnection();
 
$track = new Track($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// make sure data is not empty
if(
    !empty($data->trackName) &&
    !empty($data->trackDescription) &&
    !empty($data->trackOwnerId) &&
    !empty($data->trackCategory)
){
 
    // set product property values
    $track->trackName = $data->trackName;
    $track->trackDescription = $data->trackDescription;
    $track->trackOwnerId = $data->trackOwnerId;
    $track->trackCategory = $data->trackCategory;
 
    // create the product
    if($track->create()){
 
        // set response code - 201 created
        http_response_code(201);
 
        // tell the user
        echo json_encode(array("message" => "Track was created."));
        // echo json_encode(array("message" => $track->create()));
    }
 
    // if unable to create the product, tell the user
    else{
 
        // set response code - 503 service unavailable
        http_response_code(503);
 
        // tell the user
        echo json_encode(array("message" => "Unable to create track."));
    }
}
 
// tell the user data is incomplete
else{
 
    // set response code - 400 bad request
    http_response_code(400);
 
    // tell the user
    echo json_encode(array("message" => "Unable to create track. Data is incomplete."));
}
?>