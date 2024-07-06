<?php
include("connection.php");

$servername = "localhost";
$username = "root";
$password = ""; // Use your MySQL password here
$dbname = "health_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $delete_sql = "DELETE FROM patient_records WHERE id = $id";

    if ($conn->query($delete_sql) === TRUE) {
        echo "<script>alert('Record deleted successfully!'); window.location.href='home.php';</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Invalid request";
}

$conn->close();
?>
