<?php session_start(); ?>

<!DOCTYPE html>
<html>
<body>
<fieldset>

<div id="content" style="background-color:#B0B0B0;height:600px;width:1250px;float:left;">
<?PHP
// create connection
$link=mysqli_connect("localhost","root",'root',"musicwebsite");
// Check connection
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
echo 'Recent Downloaded List: <br>';
echo '<center> The lazy song'; echo '</br><center><img src="lazysong.jpg" height="300" width="300"></center>';
if (isset($_SESSION['U_id'])) {
	$U_id = $_SESSION['U_id'];
	
	$query = "SELECT * FROM download AS D, music AS M WHERE D.m_Id=M.m_Id AND D.U_id = ".$U_id;

	if (!mysqli_query($link,$query)) {
		die('Error: '.myquli_error($link));
	}
}

$result = mysqli_query($link, $query);

while ($row = mysqli_fetch_array($result)) {

		echo '<br>'.'Music name: '.$row['m_name'].'<br>';
		echo 'Released year: '.$row['release_year'].'<br>';
		echo 'Price: '.$row['price'].'<br>';
		echo 'Duration: '.$row['duration'].'<br>';
		echo 'Available status(1 means available, 0 means not available): '.$row['available_status'].'<br>';
		echo 'Played times: '.$row['played_times'].'<br>';}

?>
<form action="RegisteredUser.php" method="post">
<input type="submit" value="Back to Registered User">
</form>
</div>


</fieldset>
</body>
</html>