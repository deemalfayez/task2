<?php
// Show any PHP errors (for debugging)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Step 1: Connect to the database
$conn = new mysqli("localhost", "root", "", "info");

// Step 2: Check the connection
if ($conn->connect_error) {
    die(" Database connection failed: " . $conn->connect_error);
}

// Step 3: Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $age = $_POST['age'];

    // Optional: basic validation
    if (!empty($name) && !empty($age)) {
        // Step 4: Insert data into the 'user' table
        $stmt = $conn->prepare("INSERT INTO user (name, age, status) VALUES (?, ?, 0)");
        $stmt->bind_param("si", $name, $age);
        $stmt->execute();

        // Step 5: Redirect back to index.php after insertion
        header("Location: index.php");
        exit();
    } else {
        echo " Please fill in both name and age.";
    }
}
?>
