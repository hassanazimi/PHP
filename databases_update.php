<?php
  // 1. Create a database connection
  $dbhost = "localhost";
  $dbuser = "widget_cms";
  $dbpass = "secretpassword";
  $dbname = "widget_corp";
  $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
  // Test if connection succeeded
  if(mysqli_connect_errno()) {
    die("Database connection failed: " . 
         mysqli_connect_error() . 
         " (" . mysqli_connect_errno() . ")"
    );
  }
?>
<?php
	// Often these are form values in $_POST
	$id = 5;
	$menu_name = "Delete me";
	$position = 4;
	$visible = 1;
	
	// 2. Perform database query
	$query  = "UPDATE subjects SET ";
	$query .= "menu_name = '{$menu_name}', ";
	$query .= "position = {$position}, ";
	$query .= "visible = {$visible} ";
	$query .= "WHERE id = {$id}";

	$result = mysqli_query($connection, $query);

	if ($result && mysqli_affected_rows($connection)) {
		// Success
		// redirect_to("somepage.php");
		echo "Success!";
	} else {
		// Failure
		// $message = "Subject update failed";
		die("Database query failed. " . mysqli_error($connection));
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
	<head>
		<title>Databases</title>
	</head>
	<body>
		
	</body>
</html>

<?php
  // 5. Close database connection
  mysqli_close($connection);
?>