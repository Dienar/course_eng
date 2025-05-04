<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Conversational English Test</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h1>Conversational English Test</h1>

        <div id="questions-container">

            <!-- Вопрос 1 -->
            <div class="question" id="question1">
                <h3>1. Choose the correct response:</h3>
                <p>"How are you?"</p>
                <label><input type="radio" name="q1" value="A"> I'm fine, thank you.</label>
                <label><input type="radio" name="q1" value="B"> I'm 25 years old.</label>
                <label><input type="radio" name="q1" value="C"> I'm from London.</label>
                
                <!-- Кнопка и блок с ответом -->
                <button class="show-answer-btn" data-question="1">Показать ответ</button>
                <div class="answer" id="answer1" style="display: none;">
                    <p><strong>Правильный ответ:</strong> I'm fine, thank you.</p>
                </div>
            </div>

            <!-- Вопрос 2 -->
            <div class="question" id="question2">
                <h3>2. What does "What's up?" mean?</h3>
                <label><input type="radio" name="q2" value="A"> How are you?</label>
                <label><input type="radio" name="q2" value="B"> Where are you?</label>
                <label><input type="radio" name="q2" value="C"> What is your name?</label>
                
                <!-- Кнопка и блок с ответом -->
                <button class="show-answer-btn" data-question="2">Показать ответ</button>
                <div class="answer" id="answer2" style="display: none;">
                    <p><strong>Правильный ответ:</strong> How are you?</p>
                </div>
            </div>

            <!-- Вопрос 3 -->
            <div class="question" id="question3">
                <h3>3. Choose the correct phrase to order food:</h3>
                <label><input type="radio" name="q3" value="A"> Can I have a table?</label>
                <label><input type="radio" name="q3" value="B"> Can I have the menu?</label>
                <label><input type="radio" name="q3" value="C"> Can I have a ticket?</label>
                
                <!-- Кнопка и блок с ответом -->
                <button class="show-answer-btn" data-question="3">Показать ответ</button>
                <div class="answer" id="answer3" style="display: none;">
                    <p><strong>Правильный ответ:</strong> Can I have the menu?</p>
                </div>
            </div>

            <!-- Вопрос 4 -->
            <div class="question" id="question4">
                <h3>4. What is the correct response to "Thank you"?</h3>
                <label><input type="radio" name="q4" value="A"> You're welcome.</label>
                <label><input type="radio" name="q4" value="B"> I'm sorry.</label>
                <label><input type="radio" name="q4" value="C"> Goodbye.</label>
                
                <!-- Кнопка и блок с ответом -->
                <button class="show-answer-btn" data-question="4">Показать ответ</button>
                <div class="answer" id="answer4" style="display: none;">
                    <p><strong>Правильный ответ:</strong> You're welcome.</p>
                </div>
            </div>

            <!-- Вопрос 5 -->
            <div class="question" id="question5">
                <h3>5. Choose the correct phrase to ask for directions:</h3>
                <label><input type="radio" name="q5" value="A"> Where is the bathroom?</label>
                <label><input type="radio" name="q5" value="B"> How much is this?</label>
                <label><input type="radio" name="q5" value="C"> What time is it?</label>
                
                <!-- Кнопка и блок с ответом -->
                <button class="show-answer-btn" data-question="5">Показать ответ</button>
                <div class="answer" id="answer5" style="display: none;">
                    <p><strong>Правильный ответ:</strong> Where is the bathroom?</p>
                </div>
            </div>

            <!-- Вопрос 6 -->
            <div class="question" id="question6">
                <h3>6. What does "See you later" mean?</h3>
                <label><input type="radio" name="q6" value="A"> Goodbye for now.</label>
                <label><input type="radio" name="q6" value="B"> Nice to meet you.</label>
                <label><input type="radio" name="q6" value="C"> How are you?</label>
                
                <!-- Кнопка и блок с ответом -->
                <button class="show-answer-btn" data-question="6">Показать ответ</button>
                <div class="answer" id="answer6" style="display: none;">
                    <p><strong>Правильный ответ:</strong> Goodbye for now.</p>
                </div>
            </div>

            <!-- Вопрос 7 -->
            <div class="question" id="question7">
                <h3>7. Choose the correct phrase to introduce yourself:</h3>
                <label><input type="radio" name="q7" value="A"> My name is John.</label>
                <label><input type="radio" name="q7" value="B"> I'm fine, thank you.</label>
                <label><input type="radio" name="q7" value="C"> I'm from Canada.</label>
                
                <!-- Кнопка и блок с ответом -->
                <button class="show-answer-btn" data-question="7">Показать ответ</button>
                <div class="answer" id="answer7" style="display: none;">
                    <p><strong>Правильный ответ:</strong> My name is John.</p>
                </div>
            </div>

            <!-- Вопрос 8 -->
            <div class="question" id="question8">
                <h3>8. What is the correct response to "Nice to meet you"?</h3>
                <label><input type="radio" name="q8" value="A"> Nice to meet you too.</label>
                <label><input type="radio" name="q8" value="B"> I'm fine, thank you.</label>
                <label><input type="radio" name="q8" value="C"> See you later.</label>
                
                <!-- Кнопка и блок с ответом -->
                <button class="show-answer-btn" data-question="8">Показать ответ</button>
                <div class="answer" id="answer8" style="display: none;">
                    <p><strong>Правильный ответ:</strong> Nice to meet you too.</p>
                </div>
            </div>

            <!-- Вопрос 9 -->
            <div class="question" id="question9">
                <h3>9. Choose the correct phrase to ask for help:</h3>
                <label><input type="radio" name="q9" value="A"> Can you help me?</label>
                <label><input type="radio" name="q9" value="B"> How much is this?</label>
                <label><input type="radio" name="q9" value="C"> Where is the bathroom?</label>
                
                <!-- Кнопка и блок с ответом -->
                <button class="show-answer-btn" data-question="9">Показать ответ</button>
                <div class="answer" id="answer9" style="display: none;">
                    <p><strong>Правильный ответ:</strong> Can you help me?</p>
                </div>
            </div>

            <!-- Вопрос 10 -->
            <div class="question" id="question10">
                <h3>10. What does "I'm sorry" mean?</h3>
                <label><input type="radio" name="q10" value="A"> Apology.</label>
                <label><input type="radio" name="q10" value="B"> Greeting.</label>
                <label><input type="radio" name="q10" value="C"> Farewell.</label>
                
                <!-- Кнопка и блок с ответом -->
                <button class="show-answer-btn" data-question="10">Показать ответ</button>
                <div class="answer" id="answer10" style="display: none;">
                    <p><strong>Правильный ответ:</strong> Apology.</p>
                </div>
            </div>

            <!-- Вопрос 11 -->
            <div class="question" id="question11">
                <h3>11. Choose the correct phrase to ask for the time:</h3>
                <label><input type="radio" name="q11" value="A"> What time is it?</label>
                <label><input type="radio" name="q11" value="B"> Where is the bathroom?</label>
                <label><input type="radio" name="q11" value="C"> How much is this?</label>
                
                <!-- Кнопка и блок с ответом -->
                <button class="show-answer-btn" data-question="11">Показать ответ</button>
                <div class="answer" id="answer11" style="display: none;">
                    <p><strong>Правильный ответ:</strong> What time is it?</p>
                </div>
            </div>

            <!-- Вопрос 12 -->
            <div class="question" id="question12">
                <h3>12. What is the correct response to "How old are you?"</h3>
                <label><input type="radio" name="q12" value="A"> I'm 25 years old.</label>
                <label><input type="radio" name="q12" value="B"> I'm fine, thank you.</label>
                <label><input type="radio" name="q12" value="C"> I'm from London.</label>
                
                <!-- Кнопка и блок с ответом -->
                <button class="show-answer-btn" data-question="12">Показать ответ</button>
                <div class="answer" id="answer12" style="display: none;">
                    <p><strong>Правильный ответ:</strong> I'm 25 years old.</p>
                </div>
            </div>

            <!-- Вопрос 13 -->
            <div class="question" id="question13">
                <h3>13. Choose the correct phrase to ask for the price:</h3>
                <label><input type="radio" name="q13" value="A"> How much is this?</label>
                <label><input type="radio" name="q13" value="B"> Where is the bathroom?</label>
                <label><input type="radio" name="q13" value="C"> What time is it?</label>
                
                <!-- Кнопка и блок с ответом -->
                <button class="show-answer-btn" data-question="13">Показать ответ</button>
                <div class="answer" id="answer13" style="display: none;">
                    <p><strong>Правильный ответ:</strong> How much is this?</p>
                </div>
            </div>

            <!-- Вопрос 14 -->
            <div class="question" id="question14">
                <h3>14. What does "Goodbye" mean?</h3>
                <label><input type="radio" name="q14" value="A"> Farewell.</label>
                <label><input type="radio" name="q14" value="B"> Greeting.</label>
                <label><input type="radio" name="q14" value="C"> Apology.</label>
                
                <!-- Кнопка и блок с ответом -->
                <button class="show-answer-btn" data-question="14">Показать ответ</button>
                <div class="answer" id="answer14" style="display: none;">
                    <p><strong>Правильный ответ:</strong> Farewell.</p>
                </div>
            </div>

            <!-- Вопрос 15 -->
            <div class="question" id="question15">
                <h3>15. Choose the correct phrase to ask for someone's name:</h3>
                <label><input type="radio" name="q15" value="A"> What is your name?</label>
                <label><input type="radio" name="q15" value="B"> How are you?</label>
                <label><input type="radio" name="q15" value="C"> Where are you from?</label>
                
                <!-- Кнопка и блок с ответом -->
                <button class="show-answer-btn" data-question="15">Показать ответ</button>
                <div class="answer" id="answer15" style="display: none;">
                    <p><strong>Правильный ответ:</strong> What is your name?</p>
                </div>
            </div>

            <!-- Вопрос 16 -->
            <div class="question" id="question16">
                <h3>16. What is the correct response to "Where are you from?"</h3>
                <label><input type="radio" name="q16" value="A"> I'm from Canada.</label>
                <label><input type="radio" name="q16" value="B"> I'm fine, thank you.</label>
                <label><input type="radio" name="q16" value="C"> I'm 25 years old.</label>
                
                <!-- Кнопка и блок с ответом -->
                <button class="show-answer-btn" data-question="16">Показать ответ</button>
                <div class="answer" id="answer16" style="display: none;">
                    <p><strong>Правильный ответ:</strong> I'm from Canada.</p>
                </div>
            </div>

            <!-- Вопрос 17 -->
            <div class="question" id="question17">
                <h3>17. Choose the correct phrase to apologize:</h3>
                <label><input type="radio" name="q17" value="A"> I'm sorry.</label>
                <label><input type="radio" name="q17" value="B"> Thank you.</label>
                <label><input type="radio" name="q17" value="C"> Goodbye.</label>
                
                <!-- Кнопка и блок с ответом -->
                <button class="show-answer-btn" data-question="17">Показать ответ</button>
                <div class="answer" id="answer17" style="display: none;">
                    <p><strong>Правильный ответ:</strong> I'm sorry.</p>
                </div>
            </div>

            <!-- Вопрос 18 -->
            <div class="question" id="question18">
                <h3>18. What does "How's it going?" mean?</h3>
                <label><input type="radio" name="q18" value="A"> How are you?</label>
                <label><input type="radio" name="q18" value="B"> Where are you?</label>
                <label><input type="radio" name="q18" value="C"> What is your name?</label>
                
                <!-- Кнопка и блок с ответом -->
                <button class="show-answer-btn" data-question="18">Показать ответ</button>
                <div class="answer" id="answer18" style="display: none;">
                    <p><strong>Правильный ответ:</strong> How are you?</p>
                </div>
            </div>

            <!-- Вопрос 19 -->
            <div class="question" id="question19">
                <h3>19. Choose the correct phrase to ask for a favor:</h3>
                <label><input type="radio" name="q19" value="A"> Can you help me?</label>
                <label><input type="radio" name="q19" value="B"> How much is this?</label>
                <label><input type="radio" name="q19" value="C"> Where is the bathroom?</label>
                
                <!-- Кнопка и блок с ответом -->
                <button class="show-answer-btn" data-question="19">Показать ответ</button>
                <div class="answer" id="answer19" style="display: none;">
                    <p><strong>Правильный ответ:</strong> Can you help me?</p>
                </div>
            </div>

            <!-- Вопрос 20 -->
            <div class="question" id="question20">
                <h3>20. What is the correct response to "See you later"?</h3>
                <label><input type="radio" name="q20" value="A"> See you!</label>
                <label><input type="radio" name="q20" value="B"> Nice to meet you.</label>
                <label><input type="radio" name="q20" value="C"> How are you?</label>
                
                <!-- Кнопка и блок с ответом -->
                <button class="show-answer-btn" data-question="19">Показать ответ</button>
                <div class="answer" id="answer19" style="display: none;">
                    <p><strong>Правильный ответ:</strong> See you!</p>
                </div>
            </div>

        <div class="progress-bar">
            <div class="progress" id="testProgress"></div>
        </div>
        <div class="buttons-container">
            <button id="saveProgress">Save Progress</button>
            <button id="exit">Exit</button>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="script.js"></script>
    </body>

</html>