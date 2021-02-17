<!DOCTYPE html>
<html>
<head>
<title>Transfer History-Basic Banking System</title>
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
  <li><a class="active" href="transfer_history.php">Transaction History</a></li>
  <li><a href="view_cust.php">View All Customers</a></li>
  <li><a href="index.php">Home</a></li>
</ul>

<div class = main_div_table>
<div id="tableContent" class="tableClass">
	<table>
		<thead>
			<tr>
  				<th>Transaction ID</th>
  				<th>From Account</th>
  				<th>From Account</th>
  				<th>Amount</th>
  				<th>Date & Time</th>
  			</tr>
  		</thead>
  		<tbody id = "TableBody">
  		</tbody>
  	</table>
</div>
</form>
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

<?php
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

$sql = "SELECT * FROM transfer_history";
$result = $conn->query($sql);
$conn->close();
$table_row = $result->num_rows; 
$table_col = $result->field_count; 
?>
 
var num_row =<?php echo $table_row;?>;
var num_col =<?php echo $table_col;?>;
// Create one dimensional array 
var table_record = new Array(num_row);     
// Loop to create 2D array using 1D array 
for (var i = 0; i < num_row; i++) { 
    table_record[i] = new Array(num_col); 
} 
//Start Adding databse records to table_record array
var n = 0 ;
	<?php
	if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	?>
	table_record[n][0] = <?php echo $row["Transaction_Id"];?> ;
	table_record[n][1] = "<?php echo $row["From_Account"];?>" ;
	table_record[n][2] = "<?php echo $row["To_Account"];?>" ;
	table_record[n][3] = "<?php echo $row["Amount"];?>" ;
	table_record[n][4] = "<?php echo $row["Time_Details"];?>" ;
	n++; 

<?php
}
}
?>
//End Adding databse records to table_record array


//Start creating dynamic table
for (var i = 0; i < num_row; i++) {
	var element = document.getElementById("TableBody"); 
	var trow = document.createElement("tr");
	var tdata1 = document.createElement("td");
	var tdata2 = document.createElement("td");
	var tdata3 = document.createElement("td");
	var tdata4 = document.createElement("td");
	var tdata5 = document.createElement("td");
	var node1 = document.createTextNode(table_record[i][0]);
	var node2 = document.createTextNode(table_record[i][1]);
	var node3 = document.createTextNode(table_record[i][2]);
	var node4 = document.createTextNode(table_record[i][3]);
	var node5 = document.createTextNode(table_record[i][4]);
	tdata1.appendChild(node1);
	tdata2.appendChild(node2);
	tdata3.appendChild(node3);
	tdata4.appendChild(node4);
	tdata5.appendChild(node5);
	trow.appendChild(tdata1);
	trow.appendChild(tdata2);
	trow.appendChild(tdata3);
	trow.appendChild(tdata4);
	trow.appendChild(tdata5);
	element.appendChild(trow);
}
//End creating dynamic table


</script>

</body>
</html>