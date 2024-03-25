<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "saidb";

$conn =  mysqli_connect($server, $username, $password ,$dbname );

if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}

// Process registration form submission
if($_SERVER["REQUEST_METHOD"]=="POST"){

     // Retrieve form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $gender = $_POST['gender'];
    $country = $_POST['country'];

    // // Prepare SQL statement
    // $sql = "INSERT INTO user (Username, Email, Password, Gender, Country)
    // VALUES (?,?,?,?,?)";
    
    // // Prepare and bind parameters to the statement
    // $stmt = mysqli_prepare($conn, $sql);
    // mysqli_stmt_bind_param($stmt, "sssss", $username,  $email,$password , $gender, $country ); 
    
    // // Execute statement
    // if(mysqli_stmt_execute($stmt)){
    //     echo "Registration Successfull";
    // }else{
    //     echo "Error: ".mysqli_stmt_error($stmt);
    // }
    //  // Close statement
    //  mysqli_stmt_close($stmt);

    $sql = "INSERT INTO users (Username, Email, Password, Gender, Country)
    VALUES ('$username', '$email', '$password', '$gender', '$country')";

    // Execute SQL statement
    if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Registration Successful');window.location.href='loginform.html';</script>";
    } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>