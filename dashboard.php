<?php

    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://bootswatch.com/5/pulse/bootstrap.min.css" rel="stylesheet">
    <title>Dashboard</title>
    <style>
        .dashboard-container {
            padding: 2rem;
            background-color: #f8f9fa;
            min-height: 100vh;
        }
        .welcome-header {
            margin-bottom: 2rem;
        }
        .start-quiz-button {
            max-width: 300px;
            margin: 0 auto;
            display: block;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <div class="text-center welcome-header">
            <h1>Welcome,
            <p>Hello, <?php echo htmlspecialchars($_SESSION['username']); ?>! You have successfully logged in.</p>

            </h1>
            <p class="lead">Ready to test your knowledge? Start the quiz below.</p>
        </div>
        <div class="text-center">
            <a href="quiz.php"  type="button" class="btn btn-primary btn-lg start-quiz-button">Start the Quiz</a>
        </div>
    </div>

    <!-- Bootstrap JS Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
