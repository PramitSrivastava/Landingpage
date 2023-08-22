<?php
include('connection.php');
if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['user']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    
    // Check if username or email already exists
    $sql = "SELECT * FROM signup2 WHERE username = '$username' OR email = '$email'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    
    if ($count == 0) {
        // Use prepared statement to insert data
        $stmt = $conn->prepare("INSERT INTO signup2 (username, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $message);
        
        if ($stmt->execute()) {
            header("Location: welcome.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        if ($count > 0) {
            echo '<script>
                    window.location.href = "index.php";
                    alert("Username or Email already exists!!");
                  </script>';
        }
    }
}
?>
