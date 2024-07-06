
<?php include("css.php") ?>
<?php include("nav.php") ?>
<?php include("connection.php") ?>

<?php
 
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = intval($_GET['id']);

$sql = "SELECT * FROM patient_records WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $html = <<<HTML
    <div class="container mt-5">
        <h1>Patient Record</h1>
        <ul class="list-group">
            <li class="list-group-item"><strong>ID:</strong> {$row["id"]}</li>
            <li class="list-group-item"><strong>Patient Name:</strong> {$row["patient_name"]}</li>
            <li class="list-group-item"><strong>Age:</strong> {$row["age"]}</li>
            <li class="list-group-item"><strong>Gender:</strong> {$row["gender"]}</li>
            <li class="list-group-item"><strong>Diagnosis:</strong> {$row["diagnosis"]}</li>
            <li class="list-group-item"><strong>Treatment:</strong> {$row["treatment"]}</li>
            <li class="list-group-item"><strong>Doctor Name:</strong> {$row["doctor_name"]}</li>
            <li class="list-group-item"><strong>Admission Date:</strong> {$row["admission_date"]}</li>
            <li class="list-group-item"><strong>Discharge Date:</strong> {$row["discharge_date"]}</li>
        </ul>
    </div>

HTML;

    echo $html;
} else {
    echo "No record found";
}

$conn->close();
?>

<?php include("js.php") ?>