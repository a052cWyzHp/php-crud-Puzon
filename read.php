<?php
include 'config/db.php';

$sql = "SELECT * FROM students ORDER BY id DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Students</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #007BFF; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        .btn { padding: 5px 10px; text-decoration: none; color: white; border-radius: 3px; font-size: 12px; }
        .btn-edit { background-color: #ffc107; color: black; }
        .btn-delete { background-color: #dc3545; }
        .top-link { text-decoration: none; color: #007BFF; font-weight: bold; }
    </style>
</head>
<body>
    <a href="index.php" class="top-link">← Back to Home</a> | 
    <a href="create.php" class="top-link">Add New Student</a>
    
    <h2>All Student Records</h2>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Student No</th>
                <th>Full Name</th>
                <th>Branch</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Date Added</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student): ?>
            <tr>
                <td><?= htmlspecialchars($student['id']) ?></td>
                <td><?= htmlspecialchars($student['student_no']) ?></td>
                <td><?= htmlspecialchars($student['fullname']) ?></td>
                <td><?= htmlspecialchars($student['branch']) ?></td>
                <td><?= htmlspecialchars($student['email']) ?></td>
                <td><?= htmlspecialchars($student['contact']) ?></td>
                <td><?= htmlspecialchars($student['date_added']) ?></td>
                <td>
                    <a href="update.php?id=<?= $student['id'] ?>" class="btn btn-edit">Edit</a>
                    <a href="delete.php?id=<?= $student['id'] ?>" class="btn btn-delete">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>