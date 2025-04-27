<?php
require_once "islogged.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Conversational English Test</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h1>Exam English Test</h1>

        <div id="questions-container">

            <!-- Вопрос 1 -->
            <div class="question" id="question1">
                <h3>1. How would you respond to: "How are you?"</h3>
                <label><input type="radio" name="q1" value="A"> I am good, thanks!</label>
                <label><input type="radio" name="q1" value="B"> I am a teacher.</label>
                <label><input type="radio" name="q1" value="C"> I live in London.</label>

                <button class="show-answer-btn" data-question="1">Показать ответ</button>
                <div class="answer" id="answer1" style="display: none;">
                    <p><strong>Правильный ответ:</strong> I am good, thanks!</p>
                </div>
            </div>

            <!-- Вопрос 2 -->
            <div class="question" id="question2">
                <h3>2. How would you ask someone to repeat something politely?</h3>
                <label><input type="radio" name="q2" value="A"> Tell me more.</label>
                <label><input type="radio" name="q2" value="B"> What do you want?</label>
                <label><input type="radio" name="q2" value="C"> Can you say that again, please?</label>

                <button class="show-answer-btn" data-question="2">Показать ответ</button>
                <div class="answer" id="answer2" style="display: none;">
                    <p><strong>Правильный ответ:</strong> Can you say that again, please?</p>
                </div>
            </div>

            <!-- Вопрос 3 -->
            <div class="question" id="question3">
                <h3>3. How do you ask for someone's opinion?</h3>
                <label><input type="radio" name="q3" value="A"> What do you think about this?</label>
                <label><input type="radio" name="q3" value="B"> Where are you from?</label>
                <label><input type="radio" name="q3" value="C"> Are you busy?</label>

                <button class="show-answer-btn" data-question="3">Показать ответ</button>
                <div class="answer" id="answer3" style="display: none;">
                    <p><strong>Правильный ответ:</strong> What do you think about this?</p>
                </div>
            </div>

            <!-- Вопрос 4 -->
            <div class="question" id="question4">
                <h3>4. How would you invite someone to dinner?</h3>
                <label><input type="radio" name="q4" value="A"> Do you want to go to a party?</label>
                <label><input type="radio" name="q4" value="B"> Would you like to join me for dinner?</label>
                <label><input type="radio" name="q4" value="C"> Are you going home?</label>

                <button class="show-answer-btn" data-question="4">Показать ответ</button>
                <div class="answer" id="answer4" style="display: none;">
                    <p><strong>Правильный ответ:</strong> Would you like to join me for dinner?</p>
                </div>
            </div>

            <!-- Вопрос 5 -->
            <div class="question" id="question5">
                <h3>5. How do you tell someone you're not feeling well?</h3>
                <label><input type="radio" name="q5" value="A"> I'm feeling great today!</label>
                <label><input type="radio" name="q5" value="B"> I'm not feeling well.</label>
                <label><input type="radio" name="q5" value="C"> I just got back from a trip.</label>

                <button class="show-answer-btn" data-question="5">Показать ответ</button>
                <div class="answer" id="answer5" style="display: none;">
                    <p><strong>Правильный ответ:</strong> I'm not feeling well.</p>
                </div>
            </div>

            <!-- Вопрос 6 -->
            <div class="question" id="question6">
                <h3>6. How would you ask for directions?</h3>
                <label><input type="radio" name="q6" value="A"> Where is the nearest train station?</label>
                <label><input type="radio" name="q6" value="B"> What time does the train leave?</label>
                <label><input type="radio" name="q6" value="C"> I am tired, do you have a map?</label>

                <button class="show-answer-btn" data-question="6">Показать ответ</button>
                <div class="answer" id="answer6" style="display: none;">
                    <p><strong>Правильный ответ:</strong> Where is the nearest train station?</p>
                </div>
            </div>

            <!-- Вопрос 7 -->
            <div class="question" id="question7">
                <h3>7. What would you say to someone who is always late?</h3>
                <label><input type="radio" name="q7" value="A"> You need to be on time next time!</label>
                <label><input type="radio" name="q7" value="B"> I’m always on time.</label>
                <label><input type="radio" name="q7" value="C"> Why are you here?</label>

                <button class="show-answer-btn" data-question="7">Показать ответ</button>
                <div class="answer" id="answer7" style="display: none;">
                    <p><strong>Правильный ответ:</strong> You need to be on time next time!</p>
                </div>
            </div>

            <!-- Вопрос 8 -->
            <div class="question" id="question8">
                <h3>8. How do you ask someone to repeat what they said in a polite way?</h3>
                <label><input type="radio" name="q8" value="A"> Tell me again.</label>
                <label><input type="radio" name="q8" value="B"> Sorry, could you repeat that please?</label>
                <label><input type="radio" name="q8" value="C"> Can you speak louder?</label>

                <button class="show-answer-btn" data-question="8">Показать ответ</button>
                <div class="answer" id="answer8" style="display: none;">
                    <p><strong>Правильный ответ:</strong> Sorry, could you repeat that please?</p>
                </div>
            </div>

            <!-- Вопрос 9 -->
            <div class="question" id="question9">
                <h3>9. How would you ask someone how they are feeling?</h3>
                <label><input type="radio" name="q9" value="A"> Are you feeling okay?</label>
                <label><input type="radio" name="q9" value="B"> Where are you going?</label>
                <label><input type="radio" name="q9" value="C"> Are you busy now?</label>

                <button class="show-answer-btn" data-question="9">Показать ответ</button>
                <div class="answer" id="answer9" style="display: none;">
                    <p><strong>Правильный ответ:</strong> Are you feeling okay?</p>
                </div>
            </div>

            <!-- Вопрос 10 -->
            <div class="question" id="question10">
                <h3>10. How would you say goodbye to someone casually?</h3>
                <label><input type="radio" name="q10" value="A"> I need to talk to you.</label>
                <label><input type="radio" name="q10" value="B"> Take care!</label>
                <label><input type="radio" name="q10" value="C"> Where are you going?</label>

                <button class="show-answer-btn" data-question="10">Показать ответ</button>
                <div class="answer" id="answer10" style="display: none;">
                    <p><strong>Правильный ответ:</strong> Take care!</p>
                </div>
            </div>

            <!-- Вопрос 11 -->
            <div class="question" id="question11">
                <h3>11. How would you ask someone to speak slower?</h3>
                <label><input type="radio" name="q11" value="A"> Can you slow down, please?</label>
                <label><input type="radio" name="q11" value="B"> Why are you speaking so fast?</label>
                <label><input type="radio" name="q11" value="C"> Can you talk to me?</label>

                <button class="show-answer-btn" data-question="11">Показать ответ</button>
                <div class="answer" id="answer11" style="display: none;">
                    <p><strong>Правильный ответ:</strong> Can you slow down, please?</p>
                </div>
            </div>

            <!-- Вопрос 12 -->
            <div class="question" id="question12">
                <h3>12. How do you make a suggestion to a friend?</h3>
                <label><input type="radio" name="q12" value="A"> How are you feeling?</label>
                <label><input type="radio" name="q12" value="B"> Let’s watch TV.</label>
                <label><input type="radio" name="q12" value="C"> Why don’t we go for a walk?</label>

                <button class="show-answer-btn" data-question="12">Показать ответ</button>
                <div class="answer" id="answer12" style="display: none;">
                    <p><strong>Правильный ответ:</strong> Why don’t we go for a walk?</p>
                </div>
            </div>

            <!-- Вопрос 13 -->
            <div class="question" id="question13">
                <h3>13. How would you express that you don't know something?</h3>
                <label><input type="radio" name="q13" value="A"> I don’t have time.</label>
                <label><input type="radio" name="q13" value="B"> I’m not sure about that.</label>
                <label><input type="radio" name="q13" value="C"> I’m ready to leave.</label>

                <button class="show-answer-btn" data-question="13">Показать ответ</button>
                <div class="answer" id="answer13" style="display: none;">
                    <p><strong>Правильный ответ:</strong> I’m not sure about that.</p>
                </div>
            </div>

            <!-- Вопрос 14 -->
            <div class="question" id="question14">
                <h3>14. How do you ask about someone's plans for the evening?</h3>
                <label><input type="radio" name="q14" value="A"> Where are you going?</label>
                <label><input type="radio" name="q14" value="B"> What are your plans for tonight?</label>
                <label><input type="radio" name="q14" value="C"> Why are you so busy?</label>

                <button class="show-answer-btn" data-question="14">Показать ответ</button>
                <div class="answer" id="answer14" style="display: none;">
                    <p><strong>Правильный ответ:</strong> What are your plans for tonight?</p>
                </div>
            </div>

            <!-- Вопрос 15 -->
            <div class="question" id="question15">
                <h3>15. How would you ask about someone's job?</h3>
                <label><input type="radio" name="q15" value="A"> What do you do for a living?</label>
                <label><input type="radio" name="q15" value="B"> Are you enjoying your job?</label>
                <label><input type="radio" name="q15" value="C"> Where is your office?</label>

                <button class="show-answer-btn" data-question="15">Показать ответ</button>
                <div class="answer" id="answer15" style="display: none;">
                    <p><strong>Правильный ответ:</strong> What do you do for a living?</p>
                </div>
            </div>

            <!-- Вопрос 16 -->
            <div class="question" id="question16">
                <h3>16. How would you express interest in someone's hobby?</h3>
                <label><input type="radio" name="q16" value="A"> Can I join you?</label>
                <label><input type="radio" name="q16" value="B"> What time is it?</label>
                <label><input type="radio" name="q16" value="C"> What do you do in your free time?</label>

                <button class="show-answer-btn" data-question="16">Показать ответ</button>
                <div class="answer" id="answer16" style="display: none;">
                    <p><strong>Правильный ответ:</strong> What do you do in your free time?</p>
                </div>
            </div>

            <!-- Вопрос 17 -->
            <div class="question" id="question17">
                <h3>17. How would you apologize for being late?</h3>
                <label><input type="radio" name="q17" value="A"> What are you doing?</label>
                <label><input type="radio" name="q17" value="B"> I didn’t want to come.</label>
                <label><input type="radio" name="q17" value="C"> Sorry I’m late.</label>

                <button class="show-answer-btn" data-question="17">Показать ответ</button>
                <div class="answer" id="answer17" style="display: none;">
                    <p><strong>Правильный ответ:</strong> Sorry I’m late.</p>
                </div>
            </div>

            <!-- Вопрос 18 -->
            <div class="question" id="question18">
                <h3>18. How would you show you don’t understand?</h3>
                <label><input type="radio" name="q18" value="A"> I know everything.</label>
                <label><input type="radio" name="q18" value="B"> I don’t understand.</label>
                <label><input type="radio" name="q18" value="C"> Let’s talk later.</label>

                <button class="show-answer-btn" data-question="18">Показать ответ</button>
                <div class="answer" id="answer18" style="display: none;">
                    <p><strong>Правильный ответ:</strong> I don’t understand.</p>
                </div>
            </div>

            <!-- Вопрос 19 -->
            <div class="question" id="question19">
                <h3>19. How would you ask someone to repeat their phone number?</h3>
                <label><input type="radio" name="q19" value="A"> What is your number?</label>
                <label><input type="radio" name="q19" value="B"> Could you repeat your number, please?</label>
                <label><input type="radio" name="q19" value="C"> I forgot your number.</label>

                <button class="show-answer-btn" data-question="19">Показать ответ</button>
                <div class="answer" id="answer19" style="display: none;">
                    <p><strong>Правильный ответ:</strong> Could you repeat your number, please?</p>
                </div>
            </div>

            <!-- Вопрос 20 -->
            <div class="question" id="question20">
                <h3>20. How do you respond when someone says “thank you”?</h3>
                <label><input type="radio" name="q20" value="A"> You’re welcome!</label>
                <label><input type="radio" name="q20" value="B"> What’s the matter?</label>
                <label><input type="radio" name="q20" value="C"> I don’t care.</label>

                <button class="show-answer-btn" data-question="20">Показать ответ</button>
                <div class="answer" id="answer20" style="display: none;">
                    <p><strong>Правильный ответ:</strong> You’re welcome!</p>
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
