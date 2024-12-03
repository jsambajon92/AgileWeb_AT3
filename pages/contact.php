<?php
include('../config/config.php');
include('../includes/navbar.php');

$name = $email = $message = '';
$isSubmitted = false;
$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $name = htmlspecialchars($name);
    $email = htmlspecialchars($email);
    $message = htmlspecialchars($message);

    if (empty($name) || empty($email) || empty($message)) {
        $errorMessage = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMessage = "Invalid email format.";
    } else {
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $pdo->prepare("INSERT INTO ContactMessages (name, email, message) VALUES (?, ?, ?)");
            $stmt->execute([$name, $email, $message]);
            $isSubmitted = true;
        } catch (PDOException $e) {
            $errorMessage = "Error: " . $e->getMessage();
        }
        $pdo = null;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONTACTS | Leadership Knowledge Base</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/contactstyle.css">
</head>

<body id="contact-page">
    <div class="wrapper d-flex flex-column min-vh-100">
        <div class="container">
            <h2 class="mb-4">Contact Us</h2>

            <?php if ($isSubmitted): ?>
                <h3 class="text-center text-success">Thank you for contacting us!</h3>
                <p class="text-center">Your message has been successfully submitted.</p>
                <div class="text-center">
                    <h4>Submitted Details</h4>
                    <p><strong>Name:</strong> <?php echo $name; ?></p>
                    <p><strong>Email:</strong> <?php echo $email; ?></p>
                    <p><strong>Message:</strong> <?php echo nl2br($message); ?></p>
                </div>
            <?php else: ?>
                <?php if ($errorMessage): ?>
                    <div class="alert alert-danger"><?php echo $errorMessage; ?></div>
                <?php endif; ?>

                <form action="" method="POST" class="needs-validation" novalidate>
                    <div class="mb-4">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" required <?php echo $isSubmitted ? 'readonly' : ''; ?>>
                        <div class="invalid-feedback">Please enter your name.</div>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required <?php echo $isSubmitted ? 'readonly' : ''; ?>>
                        <div class="invalid-feedback">Please enter a valid email address.</div>
                    </div>

                    <div class="mb-4">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="4" required <?php echo $isSubmitted ? 'readonly' : ''; ?>><?php echo $message; ?></textarea>
                        <div class="invalid-feedback">Please enter a message.</div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary" <?php echo $isSubmitted ? 'disabled' : ''; ?>>Send Message</button>
                    </div>
                </form>
            <?php endif; ?>
        </div>

        <?php include '../includes/footer.php'; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        (function () {
            'use strict'
            window.addEventListener('load', function () {
                var forms = document.getElementsByClassName('needs-validation')
                Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
            }, false)
        })()
    </script>
</body>
</html>
