<?php
    require 'Config.php';

    $sql = "SELECT * FROM students";
    $result = $conn->query($sql);

    session_start();
    
    if (empty($_SESSION['username'])) {
        header("location:login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students List</title>
    <link href="https://bootswatch.com/5/pulse/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    </div>
    <div class="container mt-5">
        <h2 class="text-center">Students Information</h2><br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Contact</th>
                    <th>Date of birth</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
            
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["password"] . "</td>";
                        echo "<td>" . $row["contact"] . "</td>";
                        echo "<td>" . $row["dob"] . "</td>";
                        

                      
                        echo '<td><a href="edit.php?id='. $row["id"] .'" class="btn btn-primary m-1">Edit</a>';
                        echo '<a href="delete.php?id='. $row["id"] .'" class="btn btn-danger">Delete</a></td>';

                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7' class='text-center'>No results found.</td></tr>"; // Adjusted colspan to match the number of columns
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Close the connection
$conn->close();
?>
