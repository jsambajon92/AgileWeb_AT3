<?php
include('../config/config.php');
include('../includes/navbar.php');

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT id, question, description FROM questions ORDER BY RAND() LIMIT 9"; 
    $stmt = $pdo->query($sql);

    if ($stmt === false) {
        die("Unable to fetch questions at the moment. Error: " . $pdo->errorInfo()[2]);
    }

    $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

$pdo = null;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A knowledge base for leadership strategies and techniques.">
    <meta name="keywords" content="leadership, management, questions, knowledge base">
    <title>Leadership Knowledge Base</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>


<div class="wrapper d-flex flex-column min-vh-100">
    <div class="container flex-grow-1 mt-4">
        <div class="row">
            <div class="col-lg-8">
                <h1>Welcome to the Leadership Knowledge Base</h1>
                <p>Unlock a wealth of insights and strategies to become a better leader. Dive into questions, answers, and best practices curated just for you.</p>
            </div>
        </div>
        <hr>
        <h3 class="mt-4">Featured Questions</h3>
        <div class="row">
            <?php if (count($questions) > 0): ?>
                <?php foreach ($questions as $question): ?>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($question['question']); ?></h5>
                                <p class="card-text text-truncate"><?php echo htmlspecialchars($question['description']); ?></p>
                                <a href="questions.php?q=<?php echo $question['id']; ?>" class="btn btn-primary btn-sm">Read More</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No questions available at the moment. Please check back later!</p>
            <?php endif; ?>
        </div>
    </div>

    <?php include '../includes/footer.php'; ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
