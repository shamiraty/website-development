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

$sql = "SELECT * FROM patient_records";
$result = $conn->query($sql);

// Calculate mean age
$mean_age_result = $conn->query("SELECT AVG(age) as mean_age FROM patient_records");
$mean_age_row = $mean_age_result->fetch_assoc();
$mean_age = round($mean_age_row['mean_age'], 2);

// Count gender male
$count_male_result = $conn->query("SELECT COUNT(*) as count_male FROM patient_records WHERE gender = 'Male'");
$count_male_row = $count_male_result->fetch_assoc();
$count_male = $count_male_row['count_male'];

// Count gender female
$count_female_result = $conn->query("SELECT COUNT(*) as count_female FROM patient_records WHERE gender = 'Female'");
$count_female_row = $count_female_result->fetch_assoc();
$count_female = $count_female_row['count_female'];

// Count all records
$count_all_result = $conn->query("SELECT COUNT(*) as count_all FROM patient_records");
$count_all_row = $count_all_result->fetch_assoc();
$count_all = $count_all_row['count_all'];

//std
$std_age_result=$conn->query("SELECT STD(age) as std_age FROM patient_records");
$std_age_row=$std_age_result->fetch_assoc();
$std_age=round($std_age_row['std_age'],2);

//range
$range_age_result=$conn->query("SELECT MAX(age) - MIN(age) as range_age FROM patient_records");
$range_age_row=$range_age_result->fetch_assoc();
$range_age=round($range_age_row['range_age'],2);

$conn->close();
?>

<script>
        function confirmDelete(id) {
            if (confirm("Are you sure you want to delete this record?")) {
                window.location.href = 'delete.php?id=' + id;
            }
        }
    </script>
<div class="container-fluid">
    <div class="row mt-2">
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Mean Age</div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $mean_age; ?></h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Male Patients</div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $count_male; ?></h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Female Patients</div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $count_female; ?></h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Total Patients</div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $count_all; ?></h5>
                </div>
            </div>
        </div>
           <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">STD dev</div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $std_age; ?></h5>
                </div>
            </div>
        </div>
             <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Age Differences</div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $range_age; ?></h5>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card mt-1">
        <h3 class="card-header bg-primary text-white"></h3>
        <div class="card-body">
            <div class="table-responsive">
                <table id="patientTable" class="table table-striped table-bordered table-hover w-100">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Patient Name</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Treatment</th>
                            <th>Admission Date</th>
                            <th>Discharge Date</th>
                            <th>Update</th>
                            <th>Delete</th>
                            <th>View</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["patient_name"] . "</td>";
                            echo "<td>" . $row["age"] . "</td>";
                            echo "<td>" . $row["gender"] . "</td>";
                            echo "<td>" . $row["treatment"] . "</td>";
                            echo "<td>" . $row["admission_date"] . "</td>";
                            echo "<td>" . $row["discharge_date"] . "</td>";
                            echo "<td><a href='update.php?id=" . $row["id"] . "' class='btn btn-info btn-sm'>Update</a></td>";
                            echo '<td><button onclick="confirmDelete(' . $row["id"] . ')" class="btn btn-danger btn-sm">Delete</button></td>';
                            echo '<td><a href="view.php?id=' . $row["id"] . '" class="btn btn-primary btn-sm">View</a></td>';
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include("js.php") ?>
 
<script>
    $(document).ready(function() {
        $('#patientTable').DataTable({
            "paging": true, // Enable pagination
            "pageLength": 8, // Number of records per page
            "lengthChange": false, // Disable changing number of records per page
            "searching": true, // Enable search functionality
            "searchDelay": 500, // Delay in milliseconds before search is performed
            "ordering": true, // Enable sorting
            "order": [[0, 'asc']], // Default sorting by the first column in ascending order
            "info": true, // Show information about current page and total records
            "autoWidth": true, // Automatically adjust column widths
            "responsive": true, // Enable responsive design for mobile compatibility
            "language": { // Customizing language settings
                "lengthMenu": "Show _MENU_ entries", // Text for record per page dropdown
                "zeroRecords": "No matching records found",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "Showing 0 to 0 of 0 entries",
                "infoFiltered": "(filtered from _MAX_ total entries)",
                "search": "Search ITEM:",
                "paginate": {
                    "first": "First",
                    "last": "Last",
                    "next": "Next",
                    "previous": "Previous"
                }
            }
        });
    });
</script>

