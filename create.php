<?php
include 'config/db.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentNum = $_POST['student_no'];
    $fullName = $_POST['fullname'];
    $branch = $_POST['branch'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];

    $sql = "INSERT INTO students (student_no, fullname, branch, email, contact) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$studentNum, $fullName, $branch, $email, $contact])) {
        $message = "<p style='color:green;'>Student added successfully!</p>";
    } else {
        $message = "<p style='color:red;'>Error adding student.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
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
    box-sizing: border-box; 
}

button { 
    background-color: #28a745; 
    color: white; 
    padding: 10px 15px; 
    border: none; 
    cursor: pointer; 
    width: 100%; 
}

a { text-decoration: none; color: #007BFF; }
</style>
<body>
    <a href="index.php">← Back to Home</a>
    <div class="form-container">
        <h2>Add New Student</h2>
        <?= $message ?>
        <form method="POST" action="">
            <label>Student No:</label>
            <input type="text" name="student_no" required>

            <label>Full Name:</label>
            <input type="text" name="fullname" required>

            <label>Branch:</label>
            <select name="branch" required>
                <option value="">Select Branch</option>
                <option value="Computer Science">Computer Science</option>
                <option value="Engineering">Engineering</option>
                <option value="Business">Business</option>
                <option value="Arts">Arts</option>
            </select>

            <label>Email:</label>
            <input type="email" name="email" required>

            <label>Contact:</label>
            <input type="text" name="contact" required>

            <button type="submit">Save Student</button>
        </form>
    </div>
</body>
</html>