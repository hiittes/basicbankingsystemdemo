<!DOCTYPE html>
<html>
<head>
<title>Home Page-Basic Banking System</title>
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
  <li><a class="active" href="index.php">Home</a></li>
</ul>

<div class = main_div>
	<p1>"Basic Banking System"</p1><br>
	<p1>This is the demo web application</p1><br>
	<p1>which works as a bank system simulator</p1><br>
	<p1>where we can transfer money </p1><br>
	<p1>between different users.</p1><br>
<form  class = "formClass" action="view_cust.php">
<button class ="button_1">View All Customer</button>
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



</body>
</html>
