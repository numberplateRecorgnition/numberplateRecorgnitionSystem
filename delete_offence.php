<?php
$conn = new mysqli("localhost", "root", "", "trafic");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM penalty WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

header("Location: contact.php");
exit;
?>
