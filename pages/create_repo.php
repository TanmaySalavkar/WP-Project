<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "saidb";

$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully<br>"; // Debugging message

// Create New Repo
if (isset($_POST['create_repo'])) {
    $repo_name = $_POST['repo_name'];
    $repo_description = $_POST['repo_description'];
    
    // Create a new database for the repo
    $sql = "CREATE DATABASE $repo_name";
    if ($conn->query($sql) === TRUE) {
        echo "Database created successfully<br>"; // Debugging message
        if (!$conn->select_db($repo_name)) {
            die("Database selection failed: " . $conn->error);
        }
        
        if (!$conn->select_db($dbname)) {
            die("Database selection failed: " . $conn->error);
        }

        $create_table_sql = "CREATE TABLE IF NOT EXISTS repositories (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            description TEXT
        )";

        if ($conn->query($create_table_sql) === TRUE) {
            echo "Table 'repositories' created successfully<br>"; // Debugging message
            
            // Insert repo details into the table
            $insert_sql = "INSERT INTO repositories (name, description) VALUES ('$repo_name', '$repo_description')";
            if ($conn->query($insert_sql) === TRUE) {
                echo "Repo details inserted successfully<br>"; // Debugging message
            } else {
                echo "Error inserting repo details: " . $conn->error;
            }
        } else {
            echo "Error creating table 'repositories': " . $conn->error;
        }
    } else {
        echo "Error creating database: " . $conn->error;
    }
}

$conn->close();
?>
