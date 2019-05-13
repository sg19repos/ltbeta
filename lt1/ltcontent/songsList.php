<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "LT1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// $name = mysqli_real_escape_string($conn, $_POST['name']);

$sql = 'SELECT * FROM lt_playlists';

$result = $conn->query($sql);
$response = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $response['playlist_name'] = $row["playlist_name"];
        $response['playlist_url'] = $row["playlist_url"];
        $response['playlist_addedtime'] = $row["playlist_addedtime"];
        $response['playlist_id'] = $row["playlist_id"];
		
		$songUrl = "https://song.link/embed?url=".$response["playlist_url"];
		// echo '
			// <div class="col col-lg-6 col-md-auto col-sm-auto">
				// <div class="card" style="width: 29rem;margin-bottom:5%;">
				  // <div class="card-header">
					// Playlist
				  // </div>
				  // <ul class="list-group list-group-flush">
					// <li class="list-group-item">'.$response['playlist_name'].'</li>
					// <iframe width="460" height="150" src='.$songUrl.' frameborder="0" allowtransparency allowfullscreen></iframe>
					// <li class="list-group-item">'.$response['playlist_addedtime'].'</li>
				  // </ul>
				// </div>
			// </div>
		// ';


		echo '
			<div class="col-sm-12 songdetails">
				<div class="row">
					<!--div class="col-4 trackimage">
						<h5>'.$response['playlist_name'].'</h5>
					</div-->
					<div class="col-6 trackdetails">
						<div class="row">
							<div class="col-sm-12 artistname"><h5><iframe width="460" height="150" src='.$songUrl.' frameborder="0" allowtransparency allowfullscreen></iframe></h5></div>
						</div>
					</div>
				</div>
			</div>
		';
		
    }
} else {
	return "  0 results";
}
$conn->close();     
?>
