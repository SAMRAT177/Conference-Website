<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
// Create a new connection without specifying a database
$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
// Check if the database exists
$database_name = "Conference_Web";
$result = $conn->query("SHOW DATABASES LIKE '$database_name'");
if ($result->num_rows == 0) {
// The database doesn't exist, so create it
$create_db_sql = "CREATE DATABASE $database_name";
if ($conn->query($create_db_sql) === TRUE) {
echo "Database created successfully. ";
} else {
echo "Error creating database: " . $conn->error . ". ";
}
}
// Connect to the database with its name
$conn = new mysqli($servername, $username, $password, $database_name);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
// Check if the table 'students' exists
$table_name = "students";
$table_exists = $conn->query("SHOW TABLES LIKE '$table_name'");
if ($table_exists->num_rows == 0) {
// The table doesn't exist, so create it
$create_table_sql = "CREATE TABLE students (
id INT AUTO_INCREMENT PRIMARY KEY,
usn VARCHAR(255) NOT NULL,
name VARCHAR(255) NOT NULL,
branch VARCHAR(255) NOT NULL,
sem INT NOT NULL
)";
if ($conn->query($create_table_sql) === TRUE) {
echo "Table created successfully. ";
} else {
echo "Error creating table: " . $conn->error . ". ";
}
}