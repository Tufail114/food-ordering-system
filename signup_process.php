<?php
// Include the database connection file
require_once "db_connection.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    try {
        // Check if the username or email already exists
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE username = :username OR email = :email");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $result = $stmt->fetchColumn();
        if ($result > 0) {
            // Username or email already exists, store an error message in session
            session_start();
            $_SESSION['signup_error'] = "Username or email already exists. Please choose a different one.";
        } else {
            // Prepare the SQL statement for inserting the new user data
            $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");

            // Bind parameters
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashedPassword);

            // Execute the statement
            $stmt->execute();

            // Redirect to a success page or do any other action upon successful signup
            header("Location: signup_success.php");
            exit();
        }
    } catch (PDOException $e) {
        // Handle any errors that might occur during the signup process
        session_start();
        $_SESSION['signup_error'] = "Error: " . $e->getMessage();
    }

    // Redirect back to the signup and login page (signup_login.php)
    header("Location: sign.php");
    exit();
}
?>
