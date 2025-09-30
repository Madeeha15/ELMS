<?php
session_start();

// Replace with your actual DB connection info
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "leave_management";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$pass = $_POST['password'];

$sql = "SELECT * FROM employees WHERE email='$email' AND password='$pass'";
$result = $conn->query($sql);

if ($result->num_rows === 1) {
    $_SESSION['email'] = $email;
    header("Location: dashboard.php");
} else {
    echo "<script>alert('Invalid login credentials'); window.location.href='login.html';</script>";
}

$conn->close();
?>
