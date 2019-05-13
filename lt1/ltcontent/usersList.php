<?php
// header('Content-type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "LT1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$userId = mysqli_real_escape_string($conn, $_SESSION["userid"]);
$sql = 'SELECT * FROM lt_users where userId != "'.$userId.'"';

$result = $conn->query($sql);
$response = array();
// if ($result->num_rows > 0) {
if (!empty($result) && $result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        $response['userName'] = $row["userName"];
        $response['userMobileNo'] = $row["userMobileNo"];
        $response['userFullname'] = $row["userFullname"];
		
		// foreach ($row as $record) {
			// echo '<ul class="list-group">
				  // <li class="list-group-item">'.$record.'</li>
				// </ul>';
				
			// echo '
				// <div class="col-4">
					// <div class="card" style="width: 18rem;">
					  // <div class="card-header">
						// <b>'.$response['userFullname'].'</b>
					  // </div>
					  // <ul class="list-group list-group-flush">
						// <li class="list-group-item">'.$response['userFullname'].'</li>
						// <li class="list-group-item">'.$response['userName'].'</li>
					  // </ul>
					// </div>
				// </div>
			// ';
		// }
    }
    // echo json_encode($response);
	
	
} else {
    return "  0 results";
}
$conn->close();     
?>
