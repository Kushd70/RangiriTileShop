<?php
// Include database connection
include('connection.php');

// Retrieve data from POST
$data = $_POST;
$user_id = (int)$data['userId']; // Get the user ID
$first_name = $data['f_name'];   // Get the first name
$last_name = $data['l_name'];    // Get the last name
$email = $data['email'];         // Get the email address

try {
    // Prepare the SQL statement
    $sql = "UPDATE users SET email = ?, first_name = ?, last_name = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);

    // Execute the statement with provided values
    $stmt->execute([$email, $first_name, $last_name, $user_id]);

    // Check if the update was successful
    if ($stmt->rowCount() > 0) {
        echo json_encode([
            'success' => true,
            'message' => "User '{$first_name} {$last_name}' successfully updated."
        ]);
    } else {
        // No rows affected, possibly due to no changes in data
        echo json_encode([
            'success' => false,
            'message' => "No changes were made. Please check the data."
        ]);
    }
} catch (PDOException $e) {
    // Catch and handle database errors
    echo json_encode([
        'success' => false,
        'message' => 'Error processing your request: ' . $e->getMessage()
    ]);
}
