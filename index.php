<!DOCTYPE html>
<html>
<head>
    <title>Student Branch Directory</title>
</head>
<style>
body { 
    font-family: sans-serif; 
    text-align: center; 
    margin-top: 50px; 
    background-color: #f4f4f4; 
}

.mainThing { 
    background: white; 
    padding: 20px; 
    border-radius: 8px; 
    width: 50%; 
    margin: auto; 
    box-shadow: 0px 0px 10px #ccc; 
}

h1 { color: #333; }

.menu-btn { 
    display: block; 
    width: 200px; 
    padding: 10px; 
    margin: 10px auto; 
    background: #007BFF; 
    color: white; 
    text-decoration: none; 
    border-radius: 5px; 
}

.menu-btn:hover { background: #0056b3; }
</style>
<body>
    <div class="mainThing">
        <h1>Student Management System</h1>
        <h3>Welcome!</h2>
        <p>Please select an action</p>
        <a href="create.php" class="menu-btn">Add Student</a>
        <a href="read.php" class="menu-btn">View Student Records</a>
    </div>
</body>
</html>