<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link href="../CSS/styles.css" rel="stylesheet">
		<title>Login</title>
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
			// Check connection, kill connection if error occurs
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
		?>
		<div class="image">
			<a href="../Index.php"><img src="../Images/CWULogo.jpg" alt="CWU Logo" id="Logo"></a>
			<img src="../Images/CWUCampus.jpg" alt="Barge Hall on CWU campus" id="headImg">
			<h1>Your Profile</h1>
			<a href="Login.php"><input type="submit" value="Login" id="Login"></a>
		</div>
		<nav>
			<a></a>
			<a href="Project.php">Projects</a>
			<a href="Networking.php">Networking</a>
			<a href="Challenge.php">Weekly Challenge</a>
			<a href="Jobs.php">Jobs</a>
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
				<?php 
					$select = "SELECT * FROM users";
					$result = $conn->query($select);
					
					while($row = $result->fetch_assoc()) {
						if(isset($_COOKIE["username"]) && $row['userName'] === $_COOKIE['username']) {
							echo "<h2 style=\"margin-left:20%;\">" . $_COOKIE['username'] . "</h2>";
							echo "<div class=\"format\">";
							
							$imageSrc = "../UserImages/" . $row['image'];
							echo "<img src=\"$imageSrc\">";
							echo "<ul>";
							echo "<li>Name: $row[name]</li>";
							echo "<li>Graduation Year: $row[year]</li>";
							echo "<li>Projects:</li>";
							echo "<li>Skills: $row[skills]</li>";
							echo "</ul></div>";
						}
					}
				?>
				<br><br><br><br>
			</div>
			<br><br>
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