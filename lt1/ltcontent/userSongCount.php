<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "LT1";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	// $userId = mysqli_real_escape_string($conn, $_SESSION["userid"]);
	// $sql = 'SELECT COUNT(playlist_id) as total FROM lt_playlists where playlist_userid IN (SELECT playlist_id from lt_playlists)';
	
	$query = "SELECT playlist_name, playlist_userid, count(*) AS counter FROM lt_playlists GROUP BY playlist_name, playlist_userid";         
	// $result = mysql_query($query) or die(mysql_error());
	$result = $conn->query($query);

	// Print out result
	// while($row = mysqli_fetch_array($result)) {  
		// echo "There are ". $row['counter'] ." ". $row['playlist_name'] ." ".$row['playlist_userid']." items.";   
		// echo "<br />";  
	// }
	while($row = mysqli_fetch_array($result)) {
		echo '<div class="col-4">
				<div class="card" style="width: 18rem;">
				  <div class="card-header">
					<b>'.$row['playlist_name'].'</b>
				  </div>
				  <ul class="list-group list-group-flush">
					<li class="list-group-item">
						<button type="button" class="btn btn-primary">
							<span class="badge badge-light">'.$row['counter'].'</span> Songs
						</button>
					</li>					
					<li class="list-group-item">'.$row['playlist_userid'].'</li>
				  </ul>
				</div>
			</div>';

	// $result = $conn->query($sql);
	
	// $data = $result->fetch_assoc();
	// echo $data['total'];
	
	}
	$conn->close();
?>
