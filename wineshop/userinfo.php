<!DOCTYPE html>
<html style="background-image: url(images/background/3.jpg);
    background-repeat: no-repeat;
    background-size: cover;">


<!-- the head section -->
<head>
    <title>User zone</title>
    <link rel="stylesheet" type="text/css" href="css/mainmenu.css">
    <link rel="stylesheet" type="text/css" href="css/slicknav.css">
    <link rel="stylesheet" type="text/css" href="css/forms.css">
    <link rel="stylesheet" type="text/css" href="css/product_manager.css">
</head>

<!-- the body section -->
<body>
<!-- button to main menu -->
<div class="sticky">
     <p id="mainmenubutton"> <a href="index.html">back to <br> main menu </a></p>
</div>

	<p style="font-size: 2.4em; font-style: oblique; text-align: center; color:black"> 
	<b>Thanks for logging in!</b> </p>
    
	<p style="text-align: right; box-shadow: 0 2px black;">            
    		<script type="text/javascript" >
            		var today = new Date();
            		document.write( "Today is " );
            		document.write( today.toDateString() );
    		</script>
	</p>

<main>
	<p style="font-size: 2.4em; font-style: oblique; text-align: left; color:black; padding: 8px;">
	Change your details or add your address by pressing the EDIT button below <br> 
	or navigate to main page by pressing the button on the right.</p>
	
 	<table>        <thead> <tr>                
        <th>User ID</th><th>User Name</th><th>Email</th><th>Age</th><th>Role</th><th>Action</th>
            </tr>        </thead>
<?php session_start();?>
<?php
$servername = "localhost";
$username = "21354000";
$password = "21354000";
$dbname = "21354000";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// This session passess the username of the logged user
$loggedInUser = $_SESSION['specificUser'];
//echo $loggedInUser . "<br>";//prints it
echo "<h2> Hello, " . $loggedInUser . "!</h2>"; //prints it

$sql = "SELECT userID, username, email, userage, role FROM Users WHERE username='$loggedInUser'";
//echo $sql . "<br>";//OR//echo var_dump($sql)  . "<br>"; //to display the query

$result = $conn->query($sql);


if ($result->num_rows == 0) 
{    echo "0 results";}
else{
    // output data of each row
    while($row = $result->fetch_assoc()) {
echo "<tr><td>";
echo($row['userID']);
echo("</td><td>");
echo($row['username']);
echo("</td><td>");
echo($row['email']);
echo("</td><td>");

echo($row['userage']);
echo("</td><td>");


echo($row['role']);
echo("</td>");
 
echo "<td><a href='edit_user.html?id=".$row['userID']."'> <input type='submit' value='Edit'>
</a></td>"; //edit based on userID
echo "</tr>";        
}}
        ?>
               
 <!--              
<td><form action="delete_user.php" method="post">
 <input type="hidden" name="user_id"
 value="<?php echo $user['userID']; ?>">
 
 <input type="submit" value="Delete">
    </form></td>
 -->
</table>
   		<!--
        <p id="add_product_button"> 
        <a href="add_product_form.php">Add Product</a></p>
        -->
</main>
</body>
</html>
