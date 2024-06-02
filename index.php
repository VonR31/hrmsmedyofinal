<?php
session_start(); 


if (isset($_SESSION['userId'])) {
  header("Location: dashboard.php");
  exit();
}

include 'connect.php';

$firstName = '';
$lastName = '';


if (isset($_POST['signIn'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];


  $sql = "SELECT userId, firstName, lastName FROM user WHERE email = ? AND password = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ss", $email, $password); 
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
      $firstName = htmlspecialchars($row["firstName"]);
      $lastName = htmlspecialchars($row["lastName"]);


      $_SESSION['userId'] = $row["userId"];
      $_SESSION['firstName'] = $firstName;
      $_SESSION['lastName'] = $lastName;
    }


    header("Location: dashboard.php");
    exit();
  } else {
    echo "Invalid email or password. Please try again.";
  }

  $stmt->close();
}


if (isset($_POST['signUp'])) {
  $firstName = $_POST['fName'];
  $lastName = $_POST['lName'];
  $email = $_POST['email'];
  $password = $_POST['password'];


  $checkEmailQuery = "SELECT * FROM user WHERE email = ?";
  $checkEmailStmt = $conn->prepare($checkEmailQuery);
  $checkEmailStmt->bind_param("s", $email);
  $checkEmailStmt->execute();
  $checkEmailResult = $checkEmailStmt->get_result();

  if ($checkEmailResult->num_rows > 0) {
    echo "Email already exists. Please use a different email.";
  } else {

    $insertQuery = "INSERT INTO user (firstName, lastName, email, password) VALUES (?, ?, ?, ?)";
    $insertStmt = $conn->prepare($insertQuery);
    $insertStmt->bind_param("ssss", $firstName, $lastName, $email, $password); // Replace with hashed password in production
    if ($insertStmt->execute()) {
      echo "User registered successfully.";
    } else {
      echo "Error registering user.";
    }
  }

  $checkEmailStmt->close();
  $insertStmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="stylesheet" href="./assets/css/login.css">
  <title>HRMS</title>
</head>

<body>
  <div class="container" id="container">
    <div class="form-container sign-up">
      <form method="post" action="index.php">
        <h1>HRMS</h1>
        <h2>Create Account</h2>
        <input type="text" placeholder="First Name" name="fName" required>
        <input type="text" placeholder="Last Name" name="lName" required>
        <input type="email" placeholder="Email" name="email" required>
        <input type="password" placeholder="Password" name="password" required>
        <input type="submit" class="btn" value="Sign Up" name="signUp">
      </form>
    </div>
    <div class="form-container sign-in">
      <form method="post" action="index.php">
        <h1>HRMS</h1>
        <h2>Sign In</h2>
        <input type="text" placeholder="Email" name="email" required>
        <input type="password" placeholder="Password" name="password" required>
        <a href="#">Forget Your Password?</a>
        <input type="submit" class="btn" value="Sign In" name="signIn">
      </form>
    </div>
    <div class="toggle-container">
      <div class="toggle">
        <div class="toggle-panel toggle-left">
          <h1>Already have an account?</h1>
          <p>Enter your personal details to use all of site features</p>
          <button class="hidden" id="signIn">Sign In</button>
        </div>
        <div class="toggle-panel toggle-right">
          <h1>Hello!</h1>
          <p>Register with your personal details to use all of site features</p>
          <button class="hidden" id="signUp">Sign Up</button>
        </div>
      </div>
    </div>
  </div>

  <script src="./assets/js/loginScript.js"></script>
</body>

</html>