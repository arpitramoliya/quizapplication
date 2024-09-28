<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
   
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Store answers in session to access in result.php
    $_SESSION['answers'] = $_POST['answers'];
    header("Location: result.php");
    exit();
}

// Define quiz questions
$questions = [
    // HTML Questions
    1 => ["What does HTML stand for?", "Hyper Text Markup Language", "Home Tool Markup Language", "Hyperlinks and Text Markup Language", "Hyperlinking Text Management Language"],
    2 => ["Which tag is used for a hyperlink?", "a", "link", "href", "hyper"],
    3 => ["Which HTML element is used for the largest heading?", "h1", "h6", "h3", "header"],
    4 => ["What is the correct HTML element for inserting a line break?", "br", "break", "lb", "line"],
    5 => ["Which attribute is used to provide a unique identifier for an HTML element?", "id", "class", "name", "type"],
    6 => ["Which HTML element is used to define an unordered list?", "ul", "ol", "li", "list"],

    // CSS Questions
    7 => ["What does CSS stand for?", "Creative Style Sheets", "Cascading Style Sheets", "Computer Style Sheets", "Colorful Style Sheets"],
    8 => ["Which HTML tag is used to define an internal style sheet?", "style", "css", "script", "styles"],
    9 => ["How do you select an element with the id 'header' in CSS?", "#header", ".header", "header", "id(header)"],
    10 => ["Which property is used to change the font of an element?", "font-family", "font-weight", "text-style", "text-font"],
    11 => ["How do you add a background color in CSS?", "background-color:blue;", "bgcolor:blue;", "background:blue;", "color:blue;"],
    12 => ["What is the default value of the position property?", "static", "relative", "absolute", "fixed"],

    // JavaScript Questions
    13 => ["What is the correct syntax for referring to an external script called 'script.js'?", "script src='script.js'", "script href='script.js'", "script name='script.js'", "script>script.js</script>"],
    14 => ["How do you create a function in JavaScript?", "function myFunction()", "function:myFunction()", "create myFunction()", "function = myFunction()"],
    15 => ["Which of the following is a JavaScript data type?", "String", "Function", "Object", "All of the above"],
    16 => ["How can you add a comment in JavaScript?", "// This is a comment", "-- This is a comment --", "' This is a comment", "# This is a comment"],
    17 => ["Which method is used to access an HTML element by its ID?", "getElementById()", "getElementsByClass()", "getElement()", "getById()"],
    18 => ["How do you declare a variable in JavaScript?", "var x = 5;", "v x = 5;", "declare x = 5;", "int x = 5;"],

    // Bootstrap Questions
    19 => ["What is Bootstrap?", "A CSS framework", "A JavaScript library", "A programming language", "An HTML tag"],
    20 => ["Which class is used to create a button in Bootstrap?", "btn", "button", "btn-class", "btn-style"],
    21 => ["What does the 'col' class in Bootstrap do?", "Defines a column", "Creates a button", "Styles text", "Adds margin"],
    22 => ["How do you make a Bootstrap modal?", "<div class='modal'>", "modal", "<div class='modal-dialog'>", "<div class='popup'>"],
    23 => ["Which Bootstrap component is used for navigation?", "Navbar", "Menu", "List", "Dropdown"],
    24 => ["What is the grid system in Bootstrap used for?", "To create layouts", "To style buttons", "To create tables", "To manage images"],

    // Core PHP Questions
    25 => ["What does PHP stand for?", "Personal Home Page", "PHP: Hypertext Preprocessor", "Preprocessor Home Page", "Private Home Page"],
    26 => ["Which function is used to start a session in PHP?", "session_start()", "start_session()", "begin_session()", "PHP_SESSION()"],
    27 => ["How do you declare a variable in PHP?", "var_name", "var var_name", "declare var_name", "variable var_name"],
    28 => ["Which of the following is the correct way to include a file in PHP?", "include 'file.php';", "require 'file.php';", "import 'file.php';", "Both include and require"],
    29 => ["What is the correct syntax for a PHP comment?", "// This is a comment", "<!-- This is a comment -->", "' This is a comment", "# This is a comment"],
    30 => ["How do you create an array in PHP?", "array = array();", "array[];", "array = new Array();", "array = {};"]
];

// Randomly select 20 questions
// Randomly select 20 questions from the $questions array
$selected_questions = array_rand($questions, min(20, count($questions))); // Use min to avoid exceeding the array size
$quiz_questions = [];

// Build the $quiz_questions array using the selected random indices
foreach ($selected_questions as $index) {
    $quiz_questions[$index] = $questions[$index]; // Use $index directly
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Quiz Application</title>
    <link rel="stylesheet" href="">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f7f7f7;
        }

        .container {
            width: 60%;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .question {
            margin: 15px 0;
        }

        button {
            background: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            display: block;
            margin: 20px auto;
        }

        button:hover {
            background: #0056b3;
        }

        .refresh-button {
            background: #28a745;
            margin-top: 10px;
        }

        .refresh-button:hover {
            background: #218838;
        }
    </style>
</head>
<body>
    <p>Hello, <?php echo htmlspecialchars($_SESSION['username']); ?></p>
    <div class="container">
        <h2>Simple PHP Quiz</h2>
        <form method="POST" action="result.php">
    <?php foreach ($questions as $q_no => $question): ?>
        <div class="question">
            <h4><?php echo $question[0]; ?></h4>
            <?php for ($i = 1; $i <= 4; $i++): ?>
                <div>
                    <input type="radio" name="answers[<?php echo $q_no; ?>]" value="<?php echo $question[$i]; ?>" required>
                    <?php echo $question[$i]; ?>
                </div>
            <?php endfor; ?>
        </div>
    <?php endforeach; ?>
    <button type="submit">Submit Quiz</button>
</form>
        <form method="GET" action="">
            <button type="submit" class="refresh-button">Refresh Quiz</button>
        </form>
    </div>
</body>
</html>
