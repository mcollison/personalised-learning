

/* Quiz seed */
INSERT INTO `quizzes` (QuizTitle, ModuleID) VALUES
  (
    'Interfaces and Generics',
    (SELECT idModule FROM Module WHERE ModuleCode = 'CSC1022')
  ),
  (
    'Introduction to programming - Recap',
    (SELECT idModule FROM Module WHERE ModuleCode = 'CSC1022')
  );

/* Questions seed */
INSERT INTO `questions` (QuizID, QuestionTitle, QuestionText, QAnswer) VALUES
  (
    (SELECT QuizID FROM quizzes WHERE QuizTitle = 'Introduction to programming - Recap'),
    'console-output',
    'To display a value in the console, what Java command(s) do you use?',
    'System.out.println'
  ),
  (
    (SELECT QuizID FROM quizzes WHERE QuizTitle = 'Introduction to programming - Recap'),
    'recap-q1.1',
    'In the following code, the one line starting with // is highlighted in red. What does this line mean to Java?\n    <br />\n    <code>public static void main(String[] args) {\n    double taxRate = 0.15;\n    int income = 40000;\n    int deduction = 10000;\n    /',
    'This is a comment aimed at the human reader. Java ignores such comments.'
  );

/* Submissions seed */
INSERT INTO `submissions` (UserID, QuestionID, Answer) VALUES
  (
    (SELECT idUser FROM Users WHERE Username = 'mcollison'),
    (SELECT QuestionID FROM questions WHERE QuestionTitle = 'recap-q1.1'),
    'This is a comment aimed at the human reader. Java ignores such comments.'
  );

/* Options seed */
INSERT INTO `options` (QuestionID, OptionText) VALUES
  (
    (SELECT QuestionID FROM questions WHERE QuestionTitle = 'recap-q1.1'),
    'This text is used as a file name for the code.'
  ),
  (
    (SELECT QuestionID FROM questions WHERE QuestionTitle = 'recap-q1.1'),
    'This text is printed on the console.'
  ),
  (
    (SELECT QuestionID FROM questions WHERE QuestionTitle = 'recap-q1.1'),
    'This is a syntax error.'
  ),
  (
    (SELECT QuestionID FROM questions WHERE QuestionTitle = 'recap-q1.1'),
    'This is a comment aimed at the human reader. Java ignores such comments.'
  ),
  (
    (SELECT QuestionID FROM questions WHERE QuestionTitle = 'recap-q1.1'),
    'The text is stored in a special variable called //.'
  );
