<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // get the form values
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
  
    // connect to the database
    $conn = mysqli_connect('localhost', 'root', '', 'form');
  
    // check if the connection was successful
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
  
    // query the database for the user
    // $sql = "SELECT * FROM `login_info` WHERE username = '$username' AND password = '$password'";
    $sql = "INSERT INTO `registrations` (Email, password) VALUES ('$Email', '$Password')";
  
    $result = mysqli_query($conn, $sql);
  
  
    // // check if the query was successful and if a user was found
    // if (mysqli_num_rows($result) > 0) {
    //   // user was found, log them in
    //   echo "Login successful";
    // } else {
    //   // user was not found, show an error message
    //   echo "Login failed";
    // }
  
    // check if the query was successful and if a user was inserted
    if (mysqli_affected_rows($conn) > 0) {
        // the INSERT statement was successful
        echo "Email and password inserted successfully";
      } else {
        // the INSERT statement failed
        echo "Insertion failed: " . mysqli_error($conn);
      }
  
    // close the database connection
    mysqli_close($conn);
  }
  
  ?>