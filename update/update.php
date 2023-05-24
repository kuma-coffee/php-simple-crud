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

$sql = "SELECT * FROM users WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $fname = $row["firstname"];
        $lname = $row["lastname"];
        $email = $row["email"];
    }
} else {
    echo "0 result";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Form</title>
</head>
<body>
    <form action="updateuser.php" method="post">
        <label for="fname">First name:</label><br>
        <input type="text" name="fname" value="<?php echo $fname?>"><br>
        <label for="lname">Last name:</label><br>
        <input type="text" name="lname" value="<?php echo $lname?>"><br>
        <label for="email">Email:</label><br>
        <input type="text" name="email" value="<?php echo $email?>"><br><br>
        <input type="submit" value="Update">
        
        <input type="hidden" name="id" value="<?php echo $id?>">
    </form>
</body>
</html>

<?php
$conn->close();
?>