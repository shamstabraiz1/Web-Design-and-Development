<?php
include 'config/database.php';
include 'includes/header.php';
?>

<div class="row">
    <div class="col-md-12">
        <h2>Student Dashboard</h2>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Students</h5>
                        <?php
                        $query = "SELECT COUNT(*) as total FROM students";
                        $result = $conn->query($query);
                        $row = $result->fetch_assoc();
                        ?>
                        <p class="card-text display-4"><?php echo $row['total']; ?></p>
                        <a href="view_students.php" class="btn btn-primary">View All Students</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Quick Actions</h5>
                        <a href="add_student.php" class="btn btn-success mb-2 w-100">Add New Student</a>
                        <a href="view_students.php" class="btn btn-info w-100">View Student List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>