<!DOCTYPE html>
<html>
<head>
<title>View All Customers-Basic Banking System</title>
<link rel="stylesheet" href="style/style.css" type="text/css">

<link rel="apple-touch-icon" sizes="180x180" href="favicon_io/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon_io/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon_io/favicon-16x16.png">
<link rel="manifest" href="favicon_io/site.webmanifest">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<script src =js/jquery-3.5.1.min.js></script>

</head>

<body>

<div class = header_div>
<p1>Basic Banking System</p1>
</div>
<ul>
  <li><a href="transfer_history.php">Transaction History</a></li>
  <li><a class="active" href="view_cust.php">View All Customers</a></li>
  <li><a href="index.php">Home</a></li>
</ul>



<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close" onClick="spanClick()" >&times;</span>
    
    <p style = "font-size: 28px;">Details</p>
    
    <form id = modalForm action="transfer.php" method="post" onsubmit="myButton.disabled = true; return true;">
		<prow>
		<pcol><label for="mId">ID:</label></pcol>
		<pcol><input  type="text" id="mId" name="id" value="" readonly required></pcol>
		</prow>
		<prow>
		  <pcol><label for="mName">Name:</label></pcol>
		  <pcol><input type="text" id="mName" name="name" value="" readonly required></pcol>
		</prow>
		  <prow>
		  <pcol><label for="mEmail">Email:</label></pcol>
		  <pcol><input type="text" id="mEmail" name="email" value="" readonly required></pcol>
		</prow>
		<prow>
		<pcol><label for="mBalance">Balance:</label></pcol>
		<pcol><input type="text" id="mBalance" name="balance" value="" readonly required></pcol>
		</prow>
		<pcol><label for ="toAcc" style="width:50%;">Select Account to<br> transfer Money :</label><br>
		<select id="toAcc" name="Accounts" size="5" required></select></pcol>
		  <prow>
		  <pcol><label for="mAmount">Enter amount to transfer :</label><br>
		  <input type="number" style="width:50%;" id="mAmount" name="amount" value="" min="1" max="" required></pcol>
		</prow><br>
		  <input class = "button_2" type="submit" name="myButton"  value="Transfer">
	</form> 

	</div><!-- Modal content End-->

</div><!-- Modal end -->

<div class = main_div_table>
<!-- Table Content    --> 
<div id="tableContent" class="tableClass">
	<table>
		<thead>
			<tr>
  				<th>Id</th>
  				<th>Name</th>
  				<th>Email</th>
  				<th>Balance</th>
  				<th>View</th>
  			</tr>
  		</thead>
  		<tbody id = "TableBody">
  		</tbody>
  	</table>
</div>
<!-- Table Content  End  -->
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

$sql = "SELECT * FROM cust";
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
	table_record[n][0] = <?php echo $row["Id"];?> ;
	table_record[n][1] = "<?php echo $row["Name"];?>" ;
	table_record[n][2] = "<?php echo $row["email"];?>" ;
	table_record[n][3] = <?php echo $row["balance"];?> ;
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
	var node5 = document.createElement("button");
	var buttonText = document.createTextNode("View");
	node5.id = "s"+table_record[i][0];
	node5.appendChild(buttonText)
	node5.addEventListener("click", function() { reply_click(this.id);});;
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

var modal = document.getElementById("myModal");

function reply_click(clicked_id)
{
	var num_id = clicked_id.substr(1);
	num_id = parseInt(num_id);
	num_id--;
	
	var modalFormId = document.getElementById("mId");
	var modalFormName = document.getElementById("mName");
	var modalFormEmail = document.getElementById("mEmail");
	var modalFormBalance = document.getElementById("mBalance");
	var modalToAcc = document.getElementById("toAcc");
	var modalAmount = document.getElementById("mAmount");
	modalAmount.max =  table_record[num_id][3];
	modalAmount.value =  null;

	modalFormId.value = table_record[num_id][0];
	modalFormName.value = table_record[num_id][1];
	modalFormEmail.value = table_record[num_id][2];
	modalFormBalance.value = table_record[num_id][3];
	for (var i = 0; i < num_row ; i++) {
		if(i != num_id){
		var optionAcc = document.createElement("option");
		optionAcc.text = table_record[i][0] + ". " + table_record[i][1];
		optionAcc.value = table_record[i][0];
		modalToAcc.add(optionAcc);
		}
	}

	modal.style.display = "block";
}
function spanClick() {
	modal.style.display = "none";
	document.getElementById("modalForm").reset();
	var modalToAcc = document.getElementById("toAcc");
	for (var i = 0; i < num_row; i++) {
		var optionAcc = document.createElement("option");
		optionAcc.text = table_record[i][0] + ". " + table_record[i][1];
		modalToAcc.remove(optionAcc);
	}
}

//For reloadig page automatically when visited back after pressing back button  
const [entry] = performance.getEntriesByType("navigation");
// Show it in a nice table in the developer console
//console.table(entry.toJSON());
if (entry["type"] === "back_forward")
    location.reload();

</script>  


</body>
</html>

<!--  -->