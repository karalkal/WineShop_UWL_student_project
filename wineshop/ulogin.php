<?php 
session_start();
?>
<?php
include ('database.php');
function is_valid_login($uname, $password) {
    global $db;
    $password = sha1($uname . $password);
    $query = 'SELECT username FROM Users
              WHERE username = :uname 
                AND password = :password';
    $statement = $db->prepare($query);
    $statement->bindValue(':uname', $uname);
    $statement->bindValue(':password', $password);
    $statement->execute();
	$valid = ($statement->rowCount() == 1);
    $statement->closeCursor();
    return $valid;
}

$uname = filter_input(INPUT_POST, 'uname');
$password = filter_input(INPUT_POST, 'passwd');
// add 'SELECT role FROM Users WHERE role = "admin"';
// change below

// echo $uname ---- prints the logged in users username
// Start the session

$_SESSION['specificUser'] = $uname;



if (((is_valid_login($uname, $password)) == TRUE) && ($uname == "ADMIN"))
echo "<script> window.location.assign('product_manager_draft/admin_welcome.html'); </script>";

else if ((is_valid_login($uname, $password)) == TRUE)
echo "<script> window.location.assign('userinfo.php'); </script>";
else 
	echo "Incorrect Username/Password. Please try again!!!";
?>

