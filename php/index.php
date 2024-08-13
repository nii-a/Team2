<?php

include '../datacon.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $last_name = $_POST['last_name'];
    $first_name = $_POST['first_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2=$_POST['password2'];
    $phone_number = $_POST['phone'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];

    // Validate form data (you can add more validation checks here)
    if (empty($first_name) || empty($last_name) || empty($email) || empty($gender) || empty($phone_number) || empty($password) || empty($password2) || empty($age)) {
        // Some required fields are empty, show error message
        echo 'Please fill all required fields.';
        exit;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Invalid email address, show error message
        echo 'Please enter a valid email address.';
        exit;
    }
    
    if($password != $password2){
        echo"<script>alert('Passwords do not match'); window.location='../register.php'</script>";
        exit();
      }


      // Hash the password using the default algorithm (currently bcrypt)
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);

      $email1 = mysqli_real_escape_string($conn, $_POST['email']);
      $sql = "SELECT * FROM users WHERE email = '$email1'";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
        // email already exists
        echo"<script>alert('Email already exists in the database.'); window.location='../register.php'</script>";
      } else {
        $sql="INSERT INTO users(lname, fname, email, phone_no, password, age,  gender) 
        VALUES ('$last_name', '$first_name', '$email', '$phone_number', '$hashed_password', $age, '$gender')";
        $result=mysqli_query($conn, $sql);
        // Show success message and redirect to login page
        echo"<script>alert('Registration successful.'); window.location='../index.html'</script>";
        exit();
      
      }


}

?>