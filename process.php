<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'content';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $birthday = $_POST["birthday"];
    $created_day = $_POST["created_day"];
    $updated_day = $_POST["updated_day"];

    $sql = "INSERT INTO content (first_name, last_name, birthday, created_day, updated_day) 
    VALUES ('$first_name', '$last_name', '$birthday', '$created_day', '$updated_day')";

    if ($conn->query($sql) == TRUE) {
        echo "SUCCESS";
    }else{
        echo "error: " . $sql . "<br>" . $conn->error;
    }
}
?>