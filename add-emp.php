<?php

include 'connect.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   // Retrieve form data
   $firstName = $_POST['first_name'];
   $lastName = $_POST['last_name'];
   $email = $_POST['email'];
   $positionName = $_POST['position_name'];
   $departmentName = $_POST['department_name'];
   $dateOfHire = $_POST['date_of_hire'];



   // Prepare and bind
   $stmt = $conn->prepare("INSERT INTO employee (firstName, lastName, email, positionName, departmentName, dateOfHire) VALUES ('$firstName','$lastName','$email','$positionName','$departmentName','$dateOfHire')");
   if ($stmt === false) {
      die("Error preparing the statement: " . $conn->error);
   }

   
   // Execute the query
   if ($stmt->execute()) {
      echo "<script>alert('New record created successfully');</script>";
      echo "<script>window.location.href = 'employee.php';</script>";  // Redirect to employees tab
      exit();
   } else {
      echo "<script>alert('Error: " . $stmt->error . "');</script>";
   }


   // Close statement
   $stmt->close();
}

// Close connection

?>