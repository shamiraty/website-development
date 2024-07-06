<?php
include("css.php");
include("nav.php");
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

$id = intval($_GET['id']);
$sql = "SELECT * FROM patient_records WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "No record found";
    exit;
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
        $update_sql = "UPDATE patient_records SET 
            patient_name='$patient_name', 
            age=$age, 
            gender='$gender', 
            diagnosis='$diagnosis', 
            treatment='$treatment', 
            doctor_name='$doctor_name', 
            admission_date='$admission_date', 
            discharge_date='$discharge_date' 
            WHERE id=$id";

        if ($conn->query($update_sql) === TRUE) {
            $message = "Record updated successfully!";
        } else {
            $message = "Error updating record: " . $conn->error;
        }
    }
}

$conn->close();
?>

    <div class="container mt-2">
        <div class="card mt-1">
            <div class="card-header bg-primary text-white">Update Patient Record</div>
            <div class="card-body">
                <h1>Update Patient Record</h1>
                <?php if (!empty($message)): ?>
                    <div class="alert alert-info"><?php echo $message; ?></div>
                <?php endif; ?>
                <form method="post" action="update.php?id=<?php echo $id; ?>">
                    <div class="form-group">
                        <label for="patient_name">Patient Name</label>
                        <input type="text" class="form-control" id="patient_name" name="patient_name" value="<?php echo $row['patient_name']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="number" class="form-control" id="age" name="age" value="<?php echo $row['age']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-control" id="gender" name="gender" required>
                            <option value="Male" <?php if ($row['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                            <option value="Female" <?php if ($row['gender'] == 'Female') echo 'selected'; ?>>Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="diagnosis">Diagnosis</label>
                        <input type="text" class="form-control" id="diagnosis" name="diagnosis" value="<?php echo $row['diagnosis']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="treatment">Treatment</label>
                        <input type="text" class="form-control" id="treatment" name="treatment" value="<?php echo $row['treatment']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="doctor_name">Doctor Name</label>
                        <input type="text" class="form-control" id="doctor_name" name="doctor_name" value="<?php echo $row['doctor_name']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="admission_date">Admission Date</label>
                        <input type="date" class="form-control" id="admission_date" name="admission_date" value="<?php echo $row['admission_date']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="discharge_date">Discharge Date</label>
                        <input type="date" class="form-control" id="discharge_date" name="discharge_date" value="<?php echo $row['discharge_date']; ?>" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary w-25 mt-2">Update</button>
                    <button type="reset" name="reset" class="btn btn-danger w-25 mt-2">Reset</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
