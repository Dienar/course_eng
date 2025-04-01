<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Advanced English Test</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h1>Advanced English Test</h1>

        <div id="questions-container">

            <!-- Вопрос 1 -->
            <div class="question" id="question1">
                <h3>1. Choose the correct translation:</h3>
                <audio controls>
                    <source src="audio/audio_1.ogg" type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio>
                <label><input type="radio" name="q1" value="A"> Hello</label>
                <label><input type="radio" name="q1" value="B"> Goodbye</label>
                <label><input type="radio" name="q1" value="C"> Thank you</label>

                <button class="show-answer-btn" data-question="1">Показать ответ</button>
                <div class="answer" id="answer1" style="display: none;">
                    <p><strong>Правильный ответ:</strong> A. Hello</p>
                </div>
            </div>

            <!-- Вопрос 2 -->
            <div class="question" id="question2">
                <h3>2. Fill in the missing word:</h3>
                <p>The sky is <input type="text" id="q2" placeholder="blue"> today.</p>

                <button class="show-answer-btn" data-question="2">Показать ответ</button>
                <div class="answer" id="answer2" style="display: none;">
                    <p><strong>Правильный ответ:</strong> blue</p>
                </div>
            </div>

            <!-- Вопрос 3 -->
            <div class="question" id="question3">
                <h3>3. Drag the words to complete the sentence:</h3>
                <div id="dropZone3" class="drop-zone">_____ is a beautiful day.</div>
                <div class="draggable" draggable="true" id="word3a">Today</div>
                <div class="draggable" draggable="true" id="word3b">Yesterday</div>
                <button id="clearButton3">Отмена</button>

                <button class="show-answer-btn" data-question="3">Показать ответ</button>
                <div class="answer" id="answer3" style="display: none;">
                    <p><strong>Правильный ответ:</strong> Today</p>
                </div>
            </div>

            <!-- Вопрос 4 -->
            <div class="question" id="question4">
                <h3>4. What do you see in the image?</h3>
                <img src="" alt="Question Image" class="responsive-img">
                <input type="text" id="q4" placeholder="cat">

                <button class="show-answer-btn" data-question="4">Показать ответ</button>
                <div class="answer" id="answer4" style="display: none;">
                    <p><strong>Правильный ответ:</strong> cat</p>
                </div>
            </div>

            <!-- Вопрос 5 -->
            <div class="question" id="question5">
                <h3>5. Select all correct answers:</h3>
                <label><input type="checkbox" name="q5" value="A"> The Earth is round</label>
                <label><input type="checkbox" name="q5" value="B"> The sky is green</label>
                <label><input type="checkbox" name="q5" value="C"> Water is wet</label>

                <button class="show-answer-btn" data-question="5">Показать ответ</button>
                <div class="answer" id="answer5" style="display: none;">
                    <p><strong>Правильный ответ:</strong> A. The Earth is round, C. Water is wet</p>
                </div>
            </div>

            <!-- Вопрос 6 -->
            <div class="question" id="question6">
                <h3>6. Choose the correct verb tense:</h3>
                <p>She _____ to the store yesterday.</p>
                <label><input type="radio" name="q6" value="A"> go</label>
                <label><input type="radio" name="q6" value="B"> goes</label>
                <label><input type="radio" name="q6" value="C"> went</label>

                <button class="show-answer-btn" data-question="6">Показать ответ</button>
                <div class="answer" id="answer6" style="display: none;">
                    <p><strong>Правильный ответ:</strong> C. went</p>
                </div>
            </div>

            <!-- Вопрос 7 -->
            <div class="question" id="question7">
                <h3>7. Correct the sentence:</h3>
                <p>He don't like apples.</p>
                <input type="text" id="q7" placeholder="Corrected sentence">

                <button class="show-answer-btn" data-question="7">Показать ответ</button>
                <div class="answer" id="answer7" style="display: none;">
                    <p><strong>Правильный ответ:</strong> He doesn't like apples.</p>
                </div>
            </div>

            <!-- Вопрос 8 -->
            <div class="question" id="question8">
                <h3>8. Choose the correct phrasal verb:</h3>
                <p>She _____ her coat before going out.</p>
                <label><input type="radio" name="q8" value="A"> put on</label>
                <label><input type="radio" name="q8" value="B"> put off</label>
                <label><input type="radio" name="q8" value="C"> put away</label>

                <button class="show-answer-btn" data-question="8">Показать ответ</button>
                <div class="answer" id="answer8" style="display: none;">
                    <p><strong>Правильный ответ:</strong> A. put on</p>
                </div>
            </div>

            <!-- Вопрос 9 -->
            <div class="question" id="question9">
                <h3>9. Read the text and answer the question:</h3>
                <p>John has been working at the company for five years. He started as an intern and now he is a manager. He enjoys his job because it is challenging and rewarding.</p>
                <p>What is John's current position?</p>
                <input type="text" id="q9" placeholder="Answer">

                <button class="show-answer-btn" data-question="9">Показать ответ</button>
                <div class="answer" id="answer9" style="display: none;">
                    <p><strong>Правильный ответ:</strong> manager</p>
                </div>
            </div>

            <!-- Вопрос 10 -->
            <div class="question" id="question10">
                <h3>10. Choose the correct preposition:</h3>
                <p>She is interested _____ learning Spanish.</p>
                <label><input type="radio" name="q10" value="A"> in</label>
                <label><input type="radio" name="q10" value="B"> on</label>
                <label><input type="radio" name="q10" value="C"> at</label>

                <button class="show-answer-btn" data-question="10">Показать ответ</button>
                <div class="answer" id="answer10" style="display: none;">
                    <p><strong>Правильный ответ:</strong> A. in</p>
                </div>
            </div>

            <!-- Вопрос 11 -->
            <div class="question" id="question11">
                <h3>11. Choose the correct word order:</h3>
                <p>_____ to the party last night?</p>
                <label><input type="radio" name="q11" value="A"> Did you go</label>
                <label><input type="radio" name="q11" value="B"> You went</label>
                <label><input type="radio" name="q11" value="C"> Went you</label>

                <button class="show-answer-btn" data-question="11">Показать ответ</button>
                <div class="answer" id="answer11" style="display: none;">
                    <p><strong>Правильный ответ:</strong> A. Did you go</p>
                </div>
            </div>

            <!-- Вопрос 12 -->
            <div class="question" id="question12">
                <h3>12. Choose the correct synonym for "happy":</h3>
                <label><input type="radio" name="q12" value="A"> Sad</label>
                <label><input type="radio" name="q12" value="B"> Joyful</label>
                <label><input type="radio" name="q12" value="C"> Angry</label>

                <button class="show-answer-btn" data-question="12">Показать ответ</button>
                <div class="answer" id="answer12" style="display: none;">
                    <p><strong>Правильный ответ:</strong> B. Joyful</p>
                </div>
            </div>

            <!-- Вопрос 13 -->
            <div class="question" id="question13">
                <h3>13. Choose the correct antonym for "hot":</h3>
                <label><input type="radio" name="q13" value="A"> Cold</label>
                <label><input type="radio" name="q13" value="B"> Warm</label>
                <label><input type="radio" name="q13" value="C"> Boiling</label>

                <button class="show-answer-btn" data-question="13">Показать ответ</button>
                <div class="answer" id="answer13" style="display: none;">
                    <p><strong>Правильный ответ:</strong> A. Cold</p>
                </div>
            </div>

            <!-- Вопрос 14 -->
            <div class="question" id="question14">
                <h3>14. Choose the correct modal verb:</h3>
                <p>You _____ finish your homework before you go out.</p>
                <label><input type="radio" name="q14" value="A"> can</label>
                <label><input type="radio" name="q14" value="B"> must</label>
                <label><input type="radio" name="q14" value="C"> might</label>

                <button class="show-answer-btn" data-question="14">Показать ответ</button>
                <div class="answer" id="answer14" style="display: none;">
                    <p><strong>Правильный ответ:</strong> B. must</p>
                </div>
            </div>

            <!-- Вопрос 15 -->
            <div class="question" id="question15">
                <h3>15. Choose the correct conditional sentence:</h3>
                <p>If I _____ you, I would apologize.</p>
                <label><input type="radio" name="q15" value="A"> was</label>
                <label><input type="radio" name="q15" value="B"> were</label>
                <label><input type="radio" name="q15" value="C"> am</label>

                <button class="show-answer-btn" data-question="15">Показать ответ</button>
                <div class="answer" id="answer15" style="display: none;">
                    <p><strong>Правильный ответ:</strong> B. were</p>
                </div>
            </div>

            <!-- Вопрос 16 -->
            <div class="question" id="question16">
                <h3>16. Choose the correct reported speech:</h3>
                <p>She said, "I am tired."</p>
                <label><input type="radio" name="q16" value="A"> She said she is tired.</label>
                <label><input type="radio" name="q16" value="B"> She said she was tired.</label>
                <label><input type="radio" name="q16" value="C"> She said she has been tired.</label>

                <button class="show-answer-btn" data-question="16">Показать ответ</button>
                <div class="answer" id="answer16" style="display: none;">
                    <p><strong>Правильный ответ:</strong> B. She said she was tired.</p>
                </div>
            </div>

            <!-- Вопрос 17 -->
            <div class="question" id="question17">
                <h3>17. Choose the correct passive voice:</h3>
                <p>The book _____ by the author last year.</p>
                <label><input type="radio" name="q17" value="A"> was written</label>
                <label><input type="radio" name="q17" value="B"> wrote</label>
                <label><input type="radio" name="q17" value="C"> is written</label>

                <button class="show-answer-btn" data-question="17">Показать ответ</button>
                <div class="answer" id="answer17" style="display: none;">
                    <p><strong>Правильный ответ:</strong> A. was written</p>
                </div>
            </div>

            <!-- Вопрос 18 -->
            <div class="question" id="question18">
                <h3>18. Choose the correct article:</h3>
                <p>She is _____ honest person.</p>
                <label><input type="radio" name="q18" value="A"> a</label>
                <label><input type="radio" name="q18" value="B"> an</label>
                <label><input type="radio" name="q18" value="C"> the</label>

                <button class="show-answer-btn" data-question="18">Показать ответ</button>
                <div class="answer" id="answer18" style="display: none;">
                    <p><strong>Правильный ответ:</strong> B. an</p>
                </div>
            </div>

            <!-- Вопрос 19 -->
            <div class="question" id="question19">
                <h3>19. Choose the correct comparative form:</h3>
                <p>This book is _____ than that one.</p>
                <label><input type="radio" name="q19" value="A"> interesting</label>
                <label><input type="radio" name="q19" value="B"> more interesting</label>
                <label><input type="radio" name="q19" value="C"> most interesting</label>

                <button class="show-answer-btn" data-question="19">Показать ответ</button>
                <div class="answer" id="answer19" style="display: none;">
                    <p><strong>Правильный ответ:</strong> B. more interesting</p>
                </div>
            </div>

            <!-- Вопрос 20 -->
            <div class="question" id="question20">
                <h3>20. Choose the correct superlative form:</h3>
                <p>This is _____ movie I have ever seen.</p>
                <label><input type="radio" name="q20" value="A"> the best</label>
                <label><input type="radio" name="q20" value="B"> better</label>
                <label><input type="radio" name="q20" value="C"> good</label>

                <button class="show-answer-btn" data-question="20">Показать ответ</button>
                <div class="answer" id="answer20" style="display: none;">
                    <p><strong>Правильный ответ:</strong> A. the best</p>
                </div>
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