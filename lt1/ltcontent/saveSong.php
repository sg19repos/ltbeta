<?php
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "LT1";

$conn = new mysqli($servername, $username, $password, $dbname); // Create connection
if ($conn->connect_error) {     // Check connection
    die("Connection failed: " . $conn->connect_error);
} 

$songUrl = mysqli_real_escape_string($conn, $_POST['songUrl']);
$songTime = mysqli_real_escape_string($conn, $_POST['songTime']);
$userid = $_SESSION["userid"];
$username = $_SESSION["username"];

$sql = "INSERT INTO lt_playlists (playlist_url, playlist_name, playlist_addedtime, playlist_userid) VALUES ('$songUrl', '$username', '$songTime', '$userid') ";

if ($conn->query($sql) === TRUE) {
    echo "Page saved!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>