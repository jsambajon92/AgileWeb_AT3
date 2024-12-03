<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Knowledge Base</title>
    <style>
   
        .navbar .dropdown-item a {
            text-decoration: none;  
            color: inherit;         
        }

        .navbar .dropdown-item a:hover {
            color: #007bff;         
            text-decoration: none;  /
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Leadership Knowledge Base</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarQuestions" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Questions
                        </a>
                        <ul class="dropdown-menu" id="navbarQuestionsList" aria-labelledby="navbarQuestions">
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <script>
        // Fetching questions from the backend (fetchQuestions.php)
        fetch('fetchQuestions.php')
            .then(response => response.json())
            .then(data => {
                // Populating the navbar dynamically with questions
                populateQuestions(data);
            })
            .catch(error => console.error('Error fetching questions:', error));

        // Function to populate questions in the navbar
        function populateQuestions(questions) {
            const questionsList = document.getElementById('navbarQuestionsList');
            questionsList.innerHTML = ''; // Clear existing items

            questions.forEach(question => {
                const listItem = document.createElement('li');
                listItem.classList.add('dropdown-item');

                const link = document.createElement('a');
                link.href = `questions.php?q=${question.id}`; // Link to the specific question page
                link.textContent = `Question ${question.id} `;  // Display the question text

                listItem.appendChild(link);
                questionsList.appendChild(listItem);
            });
        }
    </script>
</body>
</html>
