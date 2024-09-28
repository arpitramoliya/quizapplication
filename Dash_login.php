<?php

    require 'Config.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the email and password from the form
    $email = $_POST['email'];
    $password = $_POST['password'];


    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM `login` WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password); // 'ss' means two string parameters
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if any row is returned
    if ($result->num_rows > 0) {
        header("Location: Dash.php");
       
    } else {
        $message = 'Email or password does not exist.';
    }

    // Close the connection
    $stmt->close();
    $conn->close();
}
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://bootswatch.com/5/pulse/bootstrap.min.css" rel="stylesheet">
    <style>
        .login-container {
            max-width: 400px;
            margin: auto;
            padding: 2rem;
        }
    </style>
</head>
<body>
    <div class="container login-container mt-5">
        <h2 class="text-center p-2">Dashbord Login</h2>
        <?php if ($message): ?>
            <div class="alert alert-info text-center"><?php echo $message; ?></div>
        <?php endif; ?>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>

            <div class="text-center mt-2">
                <p>Don't have an account? <a href="Register.html" class="text-decoration-none">Sign up</a></p>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
