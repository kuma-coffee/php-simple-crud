<?php
$fname = val($_POST["fname"]);
$lname = val($_POST["lname"]);
$email = val($_POST["email"]);

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

$sql = "INSERT INTO users (firstname, lastname, email) VALUES ('$fname', '$lname', '$email')";

if ($conn -> query($sql) === TRUE){
    $lastId = $conn -> insert_id;
    echo "New record created sucessfully. With ID: " . $lastId;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>