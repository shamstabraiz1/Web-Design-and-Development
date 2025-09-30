<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Student</h2>
        <?php
        require_once 'config.php';

        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM students WHERE id = $id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $student = $result->fetch_assoc();
            } else {
                echo "Student not found";
                exit();
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $course = $_POST['course'];

            $sql = "UPDATE students SET name='$name', email='$email', course='$course' WHERE id=$id";

            if ($conn->query($sql) === TRUE) {
                echo "<div class='alert alert-success'>Student updated successfully!</div>";
                header("Location: index.php");
                exit();
            } else {
                echo "<div class='alert alert-danger'>Error updating student: " . $conn->error . "</div>";
            }
        }
        ?>

        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $student['id']; ?>">
            
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" class="form-control" value="<?php echo $student['name']; ?>" required>
            </div>

            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" class="form-control" value="<?php echo $student['email']; ?>" required>
            </div>

            <div class="form-group">
                <label>Course:</label>
                <input type="text" name="course" class="form-control" value="<?php echo $student['course']; ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Student</button>
            <a href="index.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>