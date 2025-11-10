<?php
include 'config/db.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: read.php");
    exit;
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentNum = $_POST['student_no'];
    $fullName = $_POST['fullname'];
    $branch = $_POST['branch'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];

    $sql = "UPDATE students SET student_no=?, fullname=?, branch=?, email=?, contact=? WHERE id=?";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$studentNum, $fullName, $branch, $email, $contact, $id])) {
        header("Location: read.php");
        exit;
    } else {
        $message = "<p style='color:red;'>Error updating record.</p>";
    }
}

$sql = "SELECT * FROM students WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$student = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$student) {
    die("Student not found.");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Student</title>
</head>
<style>
body { 
    font-family: sans-serif; 
    padding: 20px; 
    background-color: #f9f9f9; 
}

.form-container { 
    background: white; 
    padding: 20px; 
    border: 1px solid #ddd; 
    width: 400px; 
    margin: auto; 
}

input, select { 
    width: 100%; 
    padding: 8px; 
    margin: 5px 0 15px 0; 
}

button { 
    background-color: #ffc107; 
    color: black; 
    padding: 10px 15px; 
    border: none; 
    cursor: pointer; 
    width: 100%; 
}
</style>
<body>
    <div class="form-container">
        <h2>Update Student</h2>
        <?= $message ?>
        <form method="POST" action="">
            <label>Student No:</label>
            <input type="text" name="student_no" value="<?= htmlspecialchars($student['student_no']) ?>" required>

            <label>Full Name:</label>
            <input type="text" name="fullname" value="<?= htmlspecialchars($student['fullname']) ?>" required>

            <label>Branch:</label>
            <select name="branch" required>
                <option value="Computer Science" <?= $student['branch'] == 'Computer Science' ? 'selected' : '' ?>>Computer Science</option>
                <option value="Engineering" <?= $student['branch'] == 'Engineering' ? 'selected' : '' ?>>Engineering</option>
                <option value="Business" <?= $student['branch'] == 'Business' ? 'selected' : '' ?>>Business</option>
                <option value="Arts" <?= $student['branch'] == 'Arts' ? 'selected' : '' ?>>Arts</option>
            </select>

            <label>Email:</label>
            <input type="email" name="email" value="<?= htmlspecialchars($student['email']) ?>" required>

            <label>Contact:</label>
            <input type="text" name="contact" value="<?= htmlspecialchars($student['contact']) ?>" required>

            <button type="submit">Update Student</button>
        </form>
        <br>
        <a href="read.php" style="text-decoration: none; color: #007BFF;">Cancel</a>
    </div>
</body>
</html>