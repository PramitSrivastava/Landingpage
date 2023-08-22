<?php
include('connection.php');

$sql = "SELECT * FROM signup2";
$result = mysqli_query($conn, $sql);

// Fetch data as associative array
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Display Data</title>
</head>
<body>
    <h2>User Data</h2>

    <?php foreach ($data as $row): ?>
        <p>Name: <?php echo htmlspecialchars($row['username']); ?></p>
        <p>Email: <?php echo htmlspecialchars($row['email']); ?></p>
        <p>Message: <?php echo htmlspecialchars($row['message']); ?></p>
        <hr>
    <?php endforeach; ?>

</body>
</html>
