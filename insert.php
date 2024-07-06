
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

$message = "";

if (isset($_POST['submit'])) {
    $patient_name = $_POST["patient_name"] ?? null;
    $age = $_POST["age"] ?? null;
    $gender = $_POST["gender"] ?? null;
    $diagnosis = $_POST["diagnosis"] ?? null;
    $treatment = $_POST["treatment"] ?? null;
    $doctor_name = $_POST["doctor_name"] ?? null;
    $admission_date = $_POST["admission_date"] ?? null;
    $discharge_date = $_POST["discharge_date"] ?? null;

    if (empty($patient_name) || empty($age) || empty($gender) || empty($diagnosis) || empty($treatment) || empty($doctor_name) || empty($admission_date) || empty($discharge_date)) {
        $message = "All fields are required!";
    } else {
        $insert_sql = "INSERT INTO patient_records (patient_name, age, gender, diagnosis, treatment, doctor_name, admission_date, discharge_date)
                       VALUES ('$patient_name', $age, '$gender', '$diagnosis', '$treatment', '$doctor_name', '$admission_date', '$discharge_date')";

        if ($conn->query($insert_sql) === TRUE) {
            $message = "New record created successfully!";
        } else {
            $message = "Error: " . $insert_sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
 
    <div class="container mt-2">
        <h1>Insert New Patient Record</h1>
        <?php if (!empty($message)): ?>
            <div class="alert alert-info"><?php echo $message; ?></div>
        <?php endif; ?>
        
        <div class="card mt-1">
        <div class="card-header bg-primary text-white">Insert New Patient Record</div>
        <div class="card-body">
        <form method="post" action="insert.php">
            <div class="form-group">
                <label for="patient_name">Patient Name</label>
                <input type="text" class="form-control" id="patient_name" name="patient_name" required>
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" class="form-control" id="age" name="age" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select class="form-control" id="gender" name="gender" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="diagnosis">Diagnosis</label>
                <input type="text" class="form-control" id="diagnosis" name="diagnosis" required>
            </div>
            <div class="form-group">
                <label for="treatment">Treatment</label>
                <input type="text" class="form-control" id="treatment" name="treatment" required>
            </div>
            <div class="form-group">
                <label for="doctor_name">Doctor Name</label>
                <input type="text" class="form-control" id="doctor_name" name="doctor_name" required>
            </div>
            <div class="form-group">
                <label for="admission_date">Admission Date</label>
                <input type="date" class="form-control" id="admission_date" name="admission_date" required>
            </div>
            <div class="form-group">
                <label for="discharge_date">Discharge Date</label>
                <input type="date" class="form-control" id="discharge_date" name="discharge_date" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary w-25 mt-2">Insert</button>
            <button type="reset" name="reset" class="btn btn-danger w-25 mt-2">Reset</button>
        </form>
        </div>
        </div>
    </div>
</body>
</html>
