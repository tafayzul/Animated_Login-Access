<?php
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // get the form values
        $username = $_POST['username'];
        $password = $_POST['password'];
      

        // connect to the database
        $conn = mysqli_connect('localhost', 'root', '', 'form');

        // check if the connection was successful
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }

        // query the database for the user
        $sql = "SELECT * FROM `registrations` WHERE Email = '$username' AND Password = '$password'";
        $result = mysqli_query($conn, $sql);

        // check if the query was successful and if a user was found
        if (mysqli_num_rows($result) > 0) {
          // user was found, log them in
          echo "Login successful";
        } else {
          // user was not found, show an error message
          echo "Login failed";
        }

        // close the database connection
        mysqli_close($conn);
}



?> 