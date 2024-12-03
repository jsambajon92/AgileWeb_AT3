fetch('fetchQuestions.php')
    .then(response => response.json())
    .then(data => {
        displayQuestions(data);
    })
    .catch(error => console.error('Error fetching questions:', error));

function displayQuestions(questions) {
    const questionsList = document.getElementById('questions-list');
    questionsList.innerHTML = '';

    questions.forEach(question => {
        const listItem = document.createElement('li');
        const link = document.createElement('a');
        link.href = `question.php?id=${question.id}`;
        link.textContent = `Question ${question.id}: ${question.question_text}`;
        link.classList.add('list-group-item', 'list-group-item-action');
        listItem.appendChild(link);
        questionsList.appendChild(listItem);
    });
}
