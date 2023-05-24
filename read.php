<?php
$servername = "localhost";
$username = "root";
$password = "0010";
$dbname = "phplessons";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn -> connect_error){
    die("Connection failed" . $conn->connect_error);
}

if (isset($_GET["message"])){
    if (($_GET["message"]) == "delete"){
        echo "Record deleted <br> <br>";
    }
}

$sql = "SELECT id, firstname, lastname, email FROM users";
$result = $conn->query($sql);
?>

<table>
<?php
if ($result->num_rows > 0){
    while ($row = $result->fetch_assoc()){
?>

<tr>
    <td>ID</td>
    <td><?php echo $row["id"];?></td>
    <td><a href="./delete/deluser.php?id=<?php echo $row["id"]?>">Delete</a></td>
    <td><a href="./update/update.php?id=<?php echo $row["id"]?>">Update</a></td>
</tr>

<tr>
    <td>First Name</td>
    <td><?php echo $row["firstname"]?></td>
</tr>

<tr>
    <td>Last Name</td>
    <td><?php echo $row["lastname"]?></td>
</tr>

<tr>
    <td>Email</td>
    <td><?php echo $row["email"]?></td>
</tr>

<?php
}
?>

</table>
<?php
} else {
    echo "0 result";
}

$conn->close();
?>
