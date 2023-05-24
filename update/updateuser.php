<?php
$fname = val($_POST["fname"]);
$lname = val($_POST["lname"]);
$email = val($_POST["email"]);
$id = val($_POST["id"]);

function val($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$servername = "localhost";
$username = "root";
$password = "0010";
$dbname = "phplessons";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn -> connect_error){
    die("Connection failed" . $conn->connect_error);
}

$sql = "UPDATE users SET firstname = '$fname', lastname = '$lname', email = '$email' WHERE id = '$id'";

if ($conn -> query($sql) === TRUE){
    header("location:/phplessons/read.php?message=success&id=");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>