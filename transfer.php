<?php 

 if (isset($_POST["id"])) {

$id = $_POST["id"];
$name = $_POST["name"];
$email = $_POST["email"];
$balance = $_POST["balance"];
$account = $_POST["Accounts"];
$amount = $_POST["amount"];



$diff = $balance - $amount ;



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "customers";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//Storing Sender and Receiver data
$sql = "SELECT * FROM cust WHERE ID = $id  "; 
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$sender = $id.". ".$row["Name"];
$sql = "SELECT * FROM cust WHERE ID = $account  "; 
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$receiver = $account.". ".$row["Name"];;

// echo "<br>";
// echo $sender;
// echo "<br>";
// echo $receiver;
// echo "<br>";
// echo $amount;


//Updating Cust table 
$sql = "UPDATE cust SET  balance = $diff WHERE ID = $id  "; //Update Sender
$result = $conn->query($sql);
$sql = "SELECT * FROM cust WHERE ID = $account  "; //Select Receiver
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$preBal = $row["balance"];
$preBal = $preBal + $amount ; 
$sql = "UPDATE cust SET  balance = $preBal WHERE ID = $account  "; //Update Receiver
$result = $conn->query($sql);


//Updating transfer_history table 
$sql = "INSERT INTO transfer_history (From_Account, To_Account, Amount) VALUES (?, ?, ?)";//Update history
$insertstmt = $conn->prepare($sql);
$insertstmt->bind_param("sss",$sender, $receiver, $amount );
$insertstmt->execute();


$conn->close();
/*$table_row = $result->num_rows; 
$table_col = $result->field_count; */



echo "";

}
else {
header("Location: transfer_history.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Transaction Successful(Basic Banking System)</title>
<link rel="stylesheet" href="style/style.css" type="text/css">
<link rel="apple-touch-icon" sizes="180x180" href="favicon_io/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon_io/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon_io/favicon-16x16.png">
<link rel="manifest" href="favicon_io/site.webmanifest">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  
<div class = header_div>
<p1>Basic Banking System</p1>
</div>
<ul>
  <li><a href="transfer_history.php">Transaction History</a></li>
  <li><a href="view_cust.php">View All Customers</a></li>
  <li><a href="index.php">Home</a></li>
</ul>





<div class = main_div>
<p1>Transaction of amount Rs.<?php echo $amount; ?> </p1><br>
<p1>from "<?php echo $sender; ?>" to "<?php echo $receiver; ?>" </p1><br>
<p1>is successfull.</p1><br>
</div>

<div class = footer_div>
<div class = about>
		<p>About Me</p> 
		<a href="https://www.linkedin.com/in/hitesh-gosavi-8955601b9/" style="text-decoration : none; color : #bdc7c7; font-size: 20px;">Linkedin</a>
	</div>
	<div class = source>
		<p>Source Code</p>
		<a href="https://github.com/hiittes/basicbankingsystemdemo" style="text-decoration : none; color : #bdc7c7; font-size: 20px;">GitHub</a>
	</div>
	<div class = copyright>
	<p>&copy; Copyright <?php echo date("Y");?></p>
	<a href="index.php" style="text-decoration : none; color : #bdc7c7; font-size: 20px;">Basic Banking System</a>
	</div>
</div>

<script>
if( window.history.replaceState ){
	window.history.replaceState( null, null, window.location.href );
}


</script>

</body>
</html>