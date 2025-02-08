const quizData = [
    {
      question: 'Have you got a ball? Yes, I ________ .',
      options: ['do', 'am', 'have', 'ball'],
      answer: 'have',
    },
    {
      question: 'My room is very ________ .',
      options: ['green', 'deep', 'far', 'good'],
      answer: 'good',
    },
    {
      question: '________ colour is my dress?',
      options: ['What', 'Where', 'Who', 'When'],
      answer: 'What',
    },
    {
      question: 'Is your umbrella new or ________ ?',
      options: ['red', 'old', 'long', 'wide'],
      answer: 'old',
    },
    {
      question: 'We are going to a party at Shen`s house. ______ house is on Fifth Street.',
      options: [
        'His',
        'Theirs',
        'This',
        'Our',
      ],
      answer: 'His',
    },
    {
      question: 'Is ________ a zebra or tiger?',
      options: ['theirs', 'these', 'this', 'their'],
      answer: 'this',
    },
    {
      question: 'Have you got many violets in your ________?',
      options: [
        'garden',
        'school',
        'store',
        'office',
      ],
      answer: 'garden',
    },
    {
      question: 'What bird ________ this? It is an eagle.',
      options: ['at', 'is', 'do', 'on'],
      answer: 'is',
    },
    {
      question: 'My pencils are ________ the box.',
      options: [
        'to',
        'at',
        'in',
        'with',
      ],
      answer: 'in',
    },
    {
      question: 'Jimmy can run very ________ .',
      options: ['tall', 'many', 'hard', 'fast'],
      answer: 'fast',
    },
  ];
  const mainmenu = document.getElementById('menu');
  const quizContainer = document.getElementById('quiz');
  const resultContainer = document.getElementById('result');
  const submitButton = document.getElementById('submit');
  const retryButton = document.getElementById('retry');
  const showAnswerButton = document.getElementById('showAnswer');
  
  let currentQuestion = 0;
  let score = 0;
  let incorrectAnswers = [];
  
  function shuffleArray(array) {
    for (let i = array.length - 1; i > 0; i--) {
      const j = Math.floor(Math.random() * (i + 1));
      [array[i], array[j]] = [array[j], array[i]];
    }
  }
  
  function displayQuestion() {
    const questionData = quizData[currentQuestion];
  
    const questionElement = document.createElement('div');
    questionElement.className = 'question';
    questionElement.innerHTML = questionData.question;
  
    const optionsElement = document.createElement('div');
    optionsElement.className = 'options';
  
    const shuffledOptions = [...questionData.options];
    shuffleArray(shuffledOptions);
  
    for (let i = 0; i < shuffledOptions.length; i++) {
      const option = document.createElement('label');
      option.className = 'option';
  
      const radio = document.createElement('input');
      radio.type = 'radio';
      radio.name = 'quiz';
      radio.value = shuffledOptions[i];
  
      const optionText = document.createTextNode(shuffledOptions[i]);
  
      option.appendChild(radio);
      option.appendChild(optionText);
      optionsElement.appendChild(option);
    }
  
    quizContainer.innerHTML = '';
    quizContainer.appendChild(questionElement);
    quizContainer.appendChild(optionsElement);
  }
  
  function checkAnswer() {
    const selectedOption = document.querySelector('input[name="quiz"]:checked');
    if (selectedOption) {
      const answer = selectedOption.value;
      if (answer === quizData[currentQuestion].answer) {
        score++;
      } else {
        incorrectAnswers.push({
          question: quizData[currentQuestion].question,
          incorrectAnswer: answer,
          correctAnswer: quizData[currentQuestion].answer,
        });
      }
      currentQuestion++;
      selectedOption.checked = false;
      if (currentQuestion < quizData.length) {
        displayQuestion();
      } else {
        displayResult();
      }
    }
  }
  
  function displayResult() {
    if (score == 10){
      Swal.fire({
        title: "Поздравляю ! Вам одобрена скидка !",
        icon: "success",
        draggable: true
      });
    localStorage.setItem('discount', 0.2);
    quizContainer.style.display = 'none';
    submitButton.style.display = 'none';
    retryButton.style.display = 'inline-block';
    showAnswerButton.style.display = 'none';
    resultContainer.innerHTML = `You scored ${score} out of ${quizData.length}! You have promo! Lets go!`;
  }else{
    Swal.fire({
      title: "С сожалению вы не получили скидку =(",
      icon: "error",
      draggable: true
    });
    quizContainer.style.display = 'none';
    submitButton.style.display = 'none';
    retryButton.style.display = 'inline-block';
    showAnswerButton.style.display = 'none';
    resultContainer.innerHTML = `You scored ${score} out of ${quizData.length}!`;
  }}
  
  function Mainmenu() {
    window.location = "index.php";
  }

  function showAnswer() {
    quizContainer.style.display = 'none';
    submitButton.style.display = 'none';
    retryButton.style.display = 'inline-block';
    showAnswerButton.style.display = 'none';
  
    let incorrectAnswersHtml = '';
    for (let i = 0; i < incorrectAnswers.length; i++) {
      incorrectAnswersHtml += `
        <p>
          <strong>Question:</strong> ${incorrectAnswers[i].question}<br>
          <strong>Your Answer:</strong> ${incorrectAnswers[i].incorrectAnswer}<br>
          <strong>Correct Answer:</strong> ${incorrectAnswers[i].correctAnswer}
        </p>
      `;
    }
  
    resultContainer.innerHTML = `
      <p>You scored ${score} out of ${quizData.length}!</p>
      <p>Incorrect Answers:</p>
      ${incorrectAnswersHtml}
    `;
  }
  
  submitButton.addEventListener('click', checkAnswer);
  retryButton.addEventListener('click', Mainmenu);
  showAnswerButton.addEventListener('click', showAnswer);
  
  displayQuestion();