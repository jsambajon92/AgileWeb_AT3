<?php
include('../config/config.php');
include('../includes/navbar.php');  

$question_id = isset($_GET['q']) ? $_GET['q'] : 1;

$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $pdo->prepare("SELECT * FROM questions WHERE id = ?");
$stmt->execute([$question_id]);

$question = $stmt->fetch(PDO::FETCH_ASSOC);

if ($question) {
    $question_text = $question['question'];  
    $description = $question['description'];  
    $answer = $question['answer'];  
} else {
    $question_text = "Question not found.";
    $description = "Description not available.";  
    $answer = "Answer not available.";  
}

$prev_stmt = $pdo->prepare("SELECT id FROM questions WHERE id < ? ORDER BY id DESC LIMIT 1");
$prev_stmt->execute([$question_id]);
$prev_question = $prev_stmt->fetch(PDO::FETCH_ASSOC);

$next_stmt = $pdo->prepare("SELECT id FROM questions WHERE id > ? ORDER BY id ASC LIMIT 1");
$next_stmt->execute([$question_id]);
$next_question = $next_stmt->fetch(PDO::FETCH_ASSOC);

$pdo = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Question Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fa;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            max-width: 900px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        header {
            text-align: center;
            margin-bottom: 30px;
        }

        h1 {
            font-size: 2.5em;
            color: #333;
            margin-bottom: 10px;
        }

        .question-text {
            font-size: 1.2em;
            color: #555;
            line-height: 1.6;
        }

        .footer {
            text-align: center;
            margin-top: 50px;
            color: #777;
            font-size: 0.9em;
        }

        .card-footer {
            display: flex;
            justify-content: space-between;
        }

        .btn {
            width: auto;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h1 style="text-align: center;"><?php echo htmlspecialchars($question_text); ?></h1>
        </div>
        <div class="card-body" style="min-height: 50vh;">
            <p><strong>Description:</strong></p> 
            <p><?php echo nl2br(htmlspecialchars($description)); ?></p>
            <p><strong>Answer:</strong></p> 
            <p><?php echo nl2br(htmlspecialchars($answer)); ?></p>
        </div>
        <div class="card-footer">
            <?php if ($prev_question): ?>
                <a href="?q=<?php echo $prev_question['id']; ?>" class="btn btn-primary">Previous</a>
            <?php else: ?>
                <button class="btn btn-primary disabled" disabled>Previous</button>
            <?php endif; ?>
            <?php if ($next_question): ?>
                <a href="?q=<?php echo $next_question['id']; ?>" class="btn btn-primary">Next</a>
            <?php else: ?>
                <button class="btn btn-primary disabled" disabled>Next</button>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include('../includes/footer.php'); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
