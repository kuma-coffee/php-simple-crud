<?php
$servername = "localhost";
$username = "root";
$password = "0010";
$dbname = "phplessons";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn -> connect_error){
    die("Connection failed" . $conn->connect_error);
}

$id = $_GET["id"];

$sql = "DELETE FROM users WHERE id = $id ";

if ($conn -> query($sql) === TRUE){
    // echo "Record deleted succesfuly";
    header("location:delete.php?message=delete");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>