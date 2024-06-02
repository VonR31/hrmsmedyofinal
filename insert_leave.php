<?php
include 'connect.php';

// Retrieve form data
$firstName = $_POST['firstName'] ?? '';
$lastName = $_POST['lastName'] ?? '';
$leaveType = $_POST['leaveType'] ?? '';
$startDate = $_POST['startDate'] ?? '';
$endDate = $_POST['endDate'] ?? '';

// Validate form data
if (empty($firstName) || empty($lastName) || empty($leaveType) || empty($startDate) || empty($endDate)) {
   die("All fields are required.");
}

// Find the employeeId based on first name and last name
$query = "SELECT employeeId FROM employee WHERE firstName = ? AND lastName = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $firstName, $lastName);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
   $row = $result->fetch_assoc();
   $employeeId = $row['employeeId'];

   // Insert the leave record into the leaves table
   $status = 'Pending'; // Default status
   $insert_query = "INSERT INTO employee_leave (employeeId, firstName, lastName, leaveType, startDate, endDate, status) VALUES (?, ?, ?, ?, ?, ?, ?)";
   $insert_stmt = $conn->prepare($insert_query);
   if ($insert_stmt === false) {
      die("Prepare failed: " . $conn->error);
   }
   $insert_stmt->bind_param("issssss", $employeeId, $firstName, $lastName, $leaveType, $startDate, $endDate, $status);

   if ($insert_stmt->execute()) {
      echo "<script>
            alert('Leave applied successfully!');
            window.location.href = 'leave.php';
        </script>";
   } else {
      echo "Error: " . $insert_stmt->error;
   }
} else {
   echo "Employee not found.";
}

?>