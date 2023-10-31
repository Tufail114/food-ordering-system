<?php
// Include the database connection file
require_once "db_connection.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $usernameOrEmail = $_POST["username"];
    $password = $_POST["password"];

    try {
        // Prepare the SQL statement to check for a matching username or email
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :usernameOrEmail OR email = :usernameOrEmail");
        $stmt->bindParam(':usernameOrEmail', $usernameOrEmail);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            // Verify the password
            if (password_verify($password, $user['password'])) {
                // Password is correct, set up the user's session or JWT for authentication
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                header("Location: index.php");
                exit();
            } else {
                // Password is incorrect, store an error message in session
                session_start();
                $_SESSION['error'] = "Invalid password. Please try again.";
                header("Location: sign.php"); // Redirect back to the login page
                exit();
            }
        } else {
            // User not found, store an error message in session
            session_start();
            $_SESSION['error'] = "Invalid username or email. Please try again.";
            header("Location: sing.php"); // Redirect back to the login page
            exit();
        }
    } catch (PDOException $e) {
        // Handle any errors that might occur during the login process
        session_start();
        $_SESSION['error'] = "Error: " . $e->getMessage();
        header("Location: sign.php"); // Redirect back to the login page
        exit();
    }
}
?>
