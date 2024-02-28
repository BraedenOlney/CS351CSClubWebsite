<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link href="../CSS/styles.css" rel="stylesheet">
		<script src="../JavaScript/jobScript.js" defer></script>
		<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
		<title>Jobs</title>
		<link id="favicon" rel="icon" href="../Images/cwuFavicon.png">
	</head>
	<body>
		<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "csclub";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		
		$jobTitle = '';
		$jobLocation = '';
		$jobURL = '';
		
		if($_SERVER["REQUEST_METHOD"] == "POST") {
			$jobTitle =  test_input($_POST["jobTitle"]);
			$jobLocation = test_input($_POST["jobLocation"]);
			$jobURL = test_input($_POST["jobURL"]);
			
			// Only insert data when all fields have a value in them
			if(strlen($jobTitle) > 0 && strlen($jobLocation) > 0 && strlen($jobURL) > 0) {
				$select = "SELECT * FROM jobs";
				$result = $conn->query($select);
				
				// Allow insertion if the DB is empty`
				if ($result->num_rows === 0 ) {
					$sql = "INSERT INTO jobs (job_title, job_location, job_url) VALUES( '$jobTitle', '$jobLocation', '$jobURL')";
					mysqli_query($conn, $sql);
				}
				// Otherwise check the DB for dubplicate values before posting 
				if ($result->num_rows > 0) {
					$canStore = True;
					while($row = $result->fetch_assoc()) {
						if($row["job_title"] === $jobTitle && $row["job_location"] === $jobLocation && $row["job_url"] === $jobURL) {
							$canStore = False;
						}
					}
					if ($canStore) {
						$sql = "INSERT INTO jobs VALUES( '$jobTitle', '$jobLocation', '$jobURL')";
						mysqli_query($conn, $sql);
					}
				}
			}
		}
		function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
        }
		
		?>
		<div class="image">
			<a href="../Index.php"><img src="../Images/CWULogo.jpg" alt="CWU Logo" id="Logo"></a>
			<img src="../Images/CWUCampus.jpg" alt="Barge Hall on CWU campus" id="headImg">
			<h1>Find a Job</h1>
			<a href="Login.php"><input type="submit" value="Login" id="Login"></a>
		</div>
		<nav>
			<a></a>
			<a href="Project.php">Projects</a>
			<a href="Networking.php">Networking</a>
			<a href="Challenge.php">Weekly Challenge</a>
			<a href="#">Jobs</a>
			<div class="dropdown">
				<span>More</span>
				<div class="dropdown-content">
					<a href="../Subpages/About.html">About Us</a><br><br>
					<a href="Contact.php">Contact Us</a><br><br>
					<a href="User.php">Profile</a><br><br>
				</div>
			</div>
			<a></a>
			<a></a>
		</nav>
		<div class="content">
			<br>
			<h2>Share a Job</h2>
			<br>
			<form id="jobForm" method="post" action="#">
				<br>
				<label for="jobTitle">Job Title:</label><br>
				<input type="text" name="jobTitle" id="jobTitle"><br><br>
				<label for="jobLocation">Location:</label><br>
				<input type="text" name="jobLocation" id="jobLocation"><br><br>
				<label for="jobURL">Job Link:</label><br>
				<input type="text" name="jobURL" id="jobURL"><br><br>
				<input type="submit" value="Post"><br>
				<p class="error" id="jobError"></p><br>
			</form>
			<br>
			<h2>See Jobs From the Community</h2>
			<br>
			<?php
				$select = "SELECT * FROM jobs ORDER BY jobNumber DESC";
				$result = $conn->query($select);
				
				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						echo '<br><div class="pastPosts">';
						echo '<h3>' . $row["job_title"] . '</h3>';
						echo '<h4>' . $row["job_location"] . '</h4>';
						echo '<p>' . $row["job_url"] . '</p>';
						echo '</div><br>';
					}
				}
			?>
		</div>
	</body>
	<footer>
		<p id="footerText">Created in partnership with Central Washington University, Des Moines</p><br>
		<div id="footerNav">
			<a href="../Index.php">Home</a>
			<a href="Project.php">Projects</a>
			<a href="Networking.php">Networking</a>
			<a href="Challenge.php">Weekly Challenge</a>
			<a href="Jobs.php">Jobs</a>
			<a href="../Subpages/About.html">About Us</a>
			<a href="Contact.php">Contact Us</a>
			<a href="User.php">Profile</a>
		</div>
	</footer>
</html>