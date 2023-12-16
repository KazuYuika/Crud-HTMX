<?php
require '../conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $conn->prepare("DELETE FROM contacts WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Assuming you want to refresh the page or redirect after deletion
        echo "Contact deleted successfully! $id";
        
        header("HX-Refresh: true");
    } else {
        echo "Error deleting contact: " . $conn->error;
    }

    $stmt->close();
} else {
    echo "No ID provided or incorrect request method.";
}

$conn->close();
?>