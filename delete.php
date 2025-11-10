<?php
include 'config/db.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: read.php");
    exit;
}

if (isset($_POST['confirm_delete'])) {
    $sql = "DELETE FROM students WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    header("Location: read.php");
    exit;
}

$sql = "SELECT fullname FROM students WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$student = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Confirm Delete</title>
</head>
<style>
body { 
    font-family: sans-serif; 
    text-align: center; 
    margin-top: 100px; 
    background-color: #dc3545; 
}

.warning-box { 
    background: white; 
    padding: 30px; 
    border-radius: 8px; 
    width: 400px; 
    margin: auto; 
}

h2 { color: #dc3545; }

.btn-danger { 
    background-color: #dc3545; 
    color: white; 
    padding: 10px 20px; 
    border: none; 
    cursor: pointer; 
}

.btn-secondary { 
    background-color: #6c757d; 
    color: white; 
    padding: 10px 20px; 
    text-decoration: none; 
}
</style>
<body>
    <div class="warning-box">
        <h2>Warning</h2>
        <p>Are you sure you want to delete the student:</p>
        <h3><?= htmlspecialchars($student['fullname']) ?></h3>
        <p>This action cannot be reversed.</p>
        
        <form method="POST">
            <button type="submit" name="confirm_delete" class="btn-danger">Yes, Delete it</button>
            <a href="read.php" class="btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>