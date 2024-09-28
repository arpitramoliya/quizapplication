<?php
    require "Config.php";
    $id = $_REQUEST['id'];
    $qry = "SELECT * FROM `students` WHERE `id`='$id'";
    $run = mysqli_query($conn,$qry);
    $data = mysqli_fetch_array($run);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <!-- Bootstrap CSS (Pulse Theme) -->
    <link href="https://bootswatch.com/5/pulse/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Create Account</h2>
        <form method="POST" action="edition.php">
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $data['name']; ?>" placeholder="Enter your name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $data['email']; ?>" placeholder="Enter your email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="<?php echo $data['password']; ?>" placeholder="Enter your password" required>
            </div>
            <div class="mb-3">
                <label for="contact" class="form-label">Contact Number</label>
                <input type="tel" class="form-control" id="contact" name="contact" maxlength="10" value="<?php echo $data['contact']; ?>" placeholder="Enter your contact number" required>
            </div>
            <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $data['dob']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary" name="update">Submit</button>
        </form>
    </div>
    

    <!-- Bootstrap JS Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
