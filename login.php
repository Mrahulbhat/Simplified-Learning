<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if the password is set in the POST request
    if (isset($_POST["password"])) {
        $userPassword = $_POST["password"];

        // Replace this with the hashed password stored in your database
        $hashedExpectedPassword = password_hash("admin", PASSWORD_DEFAULT);

        // Validate the password
        if (password_verify($userPassword, $hashedExpectedPassword)) {
            // Correct password
            echo json_encode(array("status" => "success", "message" => "Access Granted"));
        } else {
            // Incorrect password
            echo json_encode(array("status" => "error", "message" => "Incorrect Password"));
        }
    } else {
        // Password not set in the POST request
        echo json_encode(array("status" => "error", "message" => "Password not provided"));
    }
} else {
    // Invalid request method
    echo json_encode(array("status" => "error", "message" => "Invalid Request Method"));
}

?>
