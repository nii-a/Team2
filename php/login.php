<?php

include '../datacon.php';
/*$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$_SESSION['user_id'] = $row['userID'];
$_SESSION['email1'] = $row['email'];
*/
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate form data (you can add more validation checks here)
    if (empty($email) || empty($password)) {
        // Some required fields are empty, show error message
        echo 'Please fill all required fields.';
        exit;
    }

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    // Fetch the user's hashed password from the database
   $row = mysqli_fetch_assoc($result);
   $hashed_password = $row['password'];
   $first_name = $row['fname'];
   $email = $row['email'];

   if (mysqli_num_rows($result) == 0) {
    // User doesn't exist, show error message
    echo "<script> alert('Invalid Credentials'); window.location='../login.html' </script>";
    exit;
    }

    if($hashed_password == $row['password'])
    {
        //De-hashing
        $hashedPwdCheck = password_verify($password, $hashed_password);

        if($hashedPwdCheck == false)
        {
            echo"<script> alert('Invalid Credentials'); window.location='../login.html' </script>";
            
        }

        else if($hashedPwdCheck == true)
        {

            //login the user here
            echo"<script>alert('Login successful.'); window.location='../dashboard.php'</script>";
        }
        
    }
    else{
    // Show error message (this should never happen)
    echo 'An unexpected error occurred. Please try again later.';
    exit();
    }
}
?>