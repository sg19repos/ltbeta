<?php
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login.php");
    exit;
}
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link href="../open-iconic-master/font/css/open-iconic-bootstrap.css" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Cabin' rel='stylesheet'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<link rel="stylesheet" href="./srch1.css">

<blockquote class="blockquote text-center">
  <!-- footer class="blockquote-footer">to your music world<cite title="Source Title"> Looney Tunes</cite></footer -->
  <h1 class="display-4">Looney Tunes</h1>
<p>
	<!--a href="reset-password.php" class="btn btn-warning">Reset Your Password</a-->
	<!--a href="../logout.php" class="btn btn-danger">Sign Out of Your Account</a-->
	<p class="mb-0">Hey <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>
	<a href="../logout.php" class="oi oi-account-logout" title="Logout" style="color:red"></a></p>
</p>
</blockquote>


<div class="container">
  <hr>
  <ul class="nav nav-pills nav-fill">
    <li class="nav-item"><a class="nav-link btn-outline-secondary" data-toggle="tab" onClick=handleClick(this) href="#home">Broadcast</a></li>
    <li class="nav-item"><a class="nav-link active btn-outline-secondary" data-toggle="tab" onClick=handleClick(this) href="#menu2">Songs</a></li>
    <li class="nav-item"><a class="nav-link btn-outline-secondary" data-toggle="tab" onClick=handleClick(this) href="#menu3">Users</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane ">
		<div class="srch-main">
			<div class="srch-search jumbotron">
				<div class="srch-search-field">
					<form>
						<input class="form-control" id="searchString" type="text" placeholder="Enter song details">
						<div class="mx-auto" style="width: 45%;margin: 2%">
						  <input class="btn btn-dark" id="searchBtn" type="button" value="Search">
						</div>
					</form>
				</div>
				<div class="alert" role="alert" hidden>
				</div>
			</div>    
			<div class="srch-search-results">
					<div class="container">
						<div class="row mainrow">
						</div>
					</div>
			</div>
		</div>
	</div>
	
    <div id="menu2" class="tab-pane fade active">
	  <div class="row">
		<?php include 'songsList.php'; ?>
	  </div>
    </div>
	
	<div id="menu3" class="tab-pane fade">
	  <div class="row">
		<!?php include 'usersList.php'; ?>
		<?php include 'userSongCount.php'; ?>
	  </div>
    </div>
  </div>
</div>

<script>
	function handleClick(e){
        document.getElementsByClassName('active')[0].setAttribute('class', 'nav-link btn-outline-secondary');
        e.target.className="nav-link active btn-outline-secondary";
    }
</script>


<script type="text/javascript" src="./srch1.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
