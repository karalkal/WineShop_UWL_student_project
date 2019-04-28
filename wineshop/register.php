<?php
include('database.php');
function add_user($uname, $email, $passwd, $userage) {
    global $db;
    $password = sha1($uname . $passwd);
    $query = 'INSERT INTO Users (username, email, password, userage)
              VALUES (:uname, :email, :password, :userage)';
    $statement = $db->prepare($query);
    $statement->bindValue(':uname', $uname);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);

    $statement->bindValue(':userage', $userage);

    $outcome = $statement->execute();
    $statement->closeCursor();
	return $outcome;
}
$uname = filter_input(INPUT_POST, 'uname');
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'passwd');

$userage = filter_input(INPUT_POST, 'userage');

if ((add_user($uname, $email, $password, $userage)) == TRUE)

	echo "<script> window.location.assign('login1.html'); </script>";
else echo "This username and/or email already exists in our database! <br>Please try again!";
?>
