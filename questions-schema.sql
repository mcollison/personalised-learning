/* A script to create the partial schema to set up the tables for quiz entry and submissions */
USE ComputingIA

create table quizzes (QuizID int NOT NULL AUTO_INCREMENT, QuizTitle varchar(255), ModuleID int NOT NULL, PRIMARY KEY(QuizID), FOREIGN KEY (ModuleID) REFERENCES Module(idModule));

create table questions (QuestionID int NOT NULL AUTO_INCREMENT, QuizID int NOT NULL, QuestionTitle varchar(255), QuestionText varchar(255), QAnswer varchar(255) NOT NULL, PRIMARY KEY(QuestionID), FOREIGN KEY (QuizID) REFERENCES quizzes(QuizID));

create table submissions ( SubID int NOT NULL AUTO_INCREMENT, UserID int NOT NULL, QuestionID int NOT NULL, Answer varchar(255), PRIMARY KEY(SubID), FOREIGN KEY (UserID) REFERENCES Users(idUser), FOREIGN KEY (QuestionID) REFERENCES questions(QuestionID)); /* note: answer is submitted as a string so will have to be compared manually */

create table options (OptionID int NOT NULL AUTO_INCREMENT, QuestionID int NOT NULL, OptionText varchar(255), PRIMARY KEY(OptionID), FOREIGN KEY (QuestionID) REFERENCES questions(QuestionID));
