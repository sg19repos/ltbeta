<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Allow-Credentials: true");
    header('Content-Type: application/json');
    
    // include database and object files
    include_once '../config/database.php';
    include_once '../objects/users.php';
    
    // get database connection
    $database = new Database();
    $db = $database->getConnection();
    
    // prepare product object
    $user = new Users($db);
    
    // set ID property of record to read
    // $user->userName = isset($_GET['userName']) ? $_GET['userName'] : die();
    // $user->userPassword = isset($_GET['userPassword']) ? $_GET['userPassword'] : die();
    
    $data = json_decode(file_get_contents("php://input"));
    // make sure data is not empty
    if(
        !empty($data->userName) &&
        !empty($data->userPassword)
    ){
        $user->userName = $data->userName;
        $user->userPassword = $data->userPassword;

        // read the details of product to be edited
        $user->readOne();
        if($user->userId!=null){
            // create array
            $product_arr = array(
                "userId" =>  $user->userId,
                "userName" => $user->userName
            );
        
            // set response code - 200 OK
            http_response_code(200);
        
            // make it json format
            echo json_encode($product_arr);
        }
        
        else{
            // set response code - 404 Not found
            http_response_code(404);
        
            // tell the user product does not exist
            echo json_encode(array("message" => "Product does not exist."));
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