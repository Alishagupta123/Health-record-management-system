<?php
// Database connection
$servername = "localhost";
$username = "username";
$password = "password";
$database = "hprms_db";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetching data from database
$sql = "SELECT * FROM patients";
$result = $conn->query($sql);

// Check if there are any patients
if ($result->num_rows > 0) {
    // Outputting report header
    echo "<h2> Health REcord Management System</h2>";
    echo "<table border='1'>
            <tr>
                <th>Patient ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Admission Date</th>
            </tr>";

    // Outputting data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row['patient_id']."</td>
                <td>".$row['name']."</td>
                <td>".$row['age']."</td>
                <td>".$row['gender']."</td>
                <td>".$row['admission_date']."</td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "No patients found.";
}

// Close connection
$conn->close();
?>
