-- MySQL dump 10.13  Distrib 5.7.23, for Linux (x86_64)
--
-- Host: db.cs.ncl.ac.uk    Database: ComputingIA
-- ------------------------------------------------------
-- Server version	5.5.5-10.0.0 2.0.5-maxscale

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `ComputingIA`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `ComputingIA` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `ComputingIA`;

--
-- Table structure for table `Assignments`
--

DROP TABLE IF EXISTS `Assignments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Assignments` (
  `idAssignments` int(11) NOT NULL,
  `Assignment Name` varchar(45) NOT NULL,
  `Skill 1` varchar(45) NOT NULL,
  `Skill 2` varchar(45) NOT NULL,
  `Skill 3` varchar(45) NOT NULL,
  `Skill 4` varchar(45) NOT NULL,
  `idModule` int(11) NOT NULL,
  `Percentage of Module` varchar(45) NOT NULL,
  PRIMARY KEY (`idAssignments`),
  UNIQUE KEY `idAssignments_UNIQUE` (`idAssignments`),
  KEY `ModuleCode_idx` (`idModule`),
  CONSTRAINT `idModule` FOREIGN KEY (`idModule`) REFERENCES `Module` (`idModule`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Assignments`
--

LOCK TABLES `Assignments` WRITE;
/*!40000 ALTER TABLE `Assignments` DISABLE KEYS */;
/*!40000 ALTER TABLE `Assignments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Module`
--

DROP TABLE IF EXISTS `Module`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Module` (
  `idModule` int(11) NOT NULL,
  `ModuleCode` varchar(45) NOT NULL,
  `Module Title` varchar(45) NOT NULL,
  `Skill1` varchar(45) DEFAULT NULL,
  `Skill2` varchar(45) DEFAULT NULL,
  `Skill3` varchar(45) DEFAULT NULL,
  `Skill4` varchar(45) DEFAULT NULL,
  `Skill6` varchar(45) DEFAULT NULL,
  `Skill5` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idModule`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Module`
--

LOCK TABLES `Module` WRITE;
/*!40000 ALTER TABLE `Module` DISABLE KEYS */;
INSERT INTO `Module` VALUES (1,'CSC1021','Programming1',NULL,NULL,NULL,NULL,NULL,NULL),(2,'CSC1022','Programming2',NULL,NULL,NULL,NULL,NULL,NULL),(3,'CSC1023','Software Engineering',NULL,NULL,NULL,NULL,NULL,NULL),(4,'CSC2024','Computer Architecture ',NULL,NULL,NULL,NULL,NULL,NULL),(5,'CSC2015','Mathematics for Computing',NULL,NULL,NULL,NULL,NULL,NULL),(6,'CSC1026','Website Development',NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `Module` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Quiz`
--

DROP TABLE IF EXISTS `Quiz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Quiz` (
  `Questionid` int(11) NOT NULL,
  `Answer1` varchar(45) DEFAULT NULL,
  `Answer2` varchar(45) DEFAULT NULL,
  `Answer3` varchar(45) DEFAULT NULL,
  `Correct Answer` varchar(45) DEFAULT NULL,
  `QuestionSkills` int(11) NOT NULL,
  `Question` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`Questionid`),
  KEY `QuestionSkills_idx` (`QuestionSkills`),
  CONSTRAINT `QuestionSkills` FOREIGN KEY (`QuestionSkills`) REFERENCES `QuizSkills` (`idQuizSkills`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Quiz`
--

LOCK TABLES `Quiz` WRITE;
/*!40000 ALTER TABLE `Quiz` DISABLE KEYS */;
INSERT INTO `Quiz` VALUES (1,'1','1','1','1',1,'1'),(2,'2','2','2','2',1,'1'),(3,'3','3','3','3',1,'1'),(4,'4','4','4','4',1,'1'),(5,'5','5','5','5',1,'1'),(6,'6','6','6','6',1,'1'),(7,'7','7','7','7',1,'1'),(8,'8','8','8','8',1,'1'),(9,'9','9','9','9',1,'1'),(10,'10','10','10','10',1,'1');
/*!40000 ALTER TABLE `Quiz` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `QuizSkills`
--

DROP TABLE IF EXISTS `QuizSkills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `QuizSkills` (
  `idQuizSkills` int(11) NOT NULL,
  `Skill1` varchar(45) DEFAULT NULL,
  `Skill2` varchar(45) DEFAULT NULL,
  `Skill3` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idQuizSkills`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `QuizSkills`
--

LOCK TABLES `QuizSkills` WRITE;
/*!40000 ALTER TABLE `QuizSkills` DISABLE KEYS */;
INSERT INTO `QuizSkills` VALUES (1,'1','1','1');
/*!40000 ALTER TABLE `QuizSkills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Results`
--

DROP TABLE IF EXISTS `Results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Results` (
  `UserID` int(11) NOT NULL DEFAULT '0',
  `QuizDate` varchar(45) NOT NULL,
  `QuizScore` varchar(45) NOT NULL,
  `QuizTopic` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`UserID`),
  CONSTRAINT `UseriD` FOREIGN KEY (`UserID`) REFERENCES `Users` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Results`
--

LOCK TABLES `Results` WRITE;
/*!40000 ALTER TABLE `Results` DISABLE KEYS */;
INSERT INTO `Results` VALUES (1,'2','2','test');
/*!40000 ALTER TABLE `Results` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Users`
--

DROP TABLE IF EXISTS `Users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Users` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `AccountType` varchar(45) DEFAULT NULL,
  `Email` varchar(200) NOT NULL,
  `FirstName` varchar(45) NOT NULL,
  `LastName` varchar(45) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='A table of users, passwords and types of accounts';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Users`
--

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;
INSERT INTO `Users` VALUES (1,'test','test','student ','test@test.com','test','test'),(4,'test2','test2',NULL,'test2@test.com','test2','test2'),(7,'test2','test2',NULL,'test2','test2','test2'),(10,'test2','test2',NULL,'test2','test2','test2'),(13,'test2','test2',NULL,'test2','test2','test2'),(16,'mcollison','password','dev','m.g.collison@gmail.com','Matt','Collison');
/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `options`
--

DROP TABLE IF EXISTS `options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `options` (
  `OptionID` int(11) NOT NULL AUTO_INCREMENT,
  `QuestionID` int(11) NOT NULL,
  `OptionText` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`OptionID`),
  KEY `QuestionID` (`QuestionID`),
  CONSTRAINT `options_ibfk_1` FOREIGN KEY (`QuestionID`) REFERENCES `questions` (`QuestionID`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `options`
--

LOCK TABLES `options` WRITE;
/*!40000 ALTER TABLE `options` DISABLE KEYS */;
INSERT INTO `options` VALUES (4,7,'This text is used as a file name for the code.'),(7,7,'This text is printed on the console.'),(10,7,'This is a syntax error.'),(13,7,'This is a comment aimed at the human reader. Java ignores such comments.'),(16,7,'The text is stored in a special variable called //.');
/*!40000 ALTER TABLE `options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `QuestionID` int(11) NOT NULL AUTO_INCREMENT,
  `QuizID` int(11) NOT NULL,
  `QuestionTitle` varchar(255) DEFAULT NULL,
  `QuestionText` varchar(255) DEFAULT NULL,
  `QAnswer` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`QuestionID`),
  KEY `QuizID` (`QuizID`),
  CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`QuizID`) REFERENCES `quizzes` (`QuizID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (4,7,NULL,'To display a value in the console, what Java command(s) do you use?','System.out.println'),(7,7,'recap-q1.1','In the following code, the one line starting with // is highlighted in red. What does this line mean to Java?\n    <br />\n    <code>public static void main(String[] args) {\n    double taxRate = 0.15;\n    int income = 40000;\n    int deduction = 10000;\n    /','This is a comment aimed at the human reader. Java ignores such comments.');
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quizzes`
--

DROP TABLE IF EXISTS `quizzes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quizzes` (
  `QuizID` int(11) NOT NULL AUTO_INCREMENT,
  `QuizTitle` varchar(255) DEFAULT NULL,
  `ModuleID` int(11) NOT NULL,
  PRIMARY KEY (`QuizID`),
  KEY `ModuleID` (`ModuleID`),
  CONSTRAINT `quizzes_ibfk_1` FOREIGN KEY (`ModuleID`) REFERENCES `Module` (`idModule`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quizzes`
--

LOCK TABLES `quizzes` WRITE;
/*!40000 ALTER TABLE `quizzes` DISABLE KEYS */;
INSERT INTO `quizzes` VALUES (4,'Interfaces and Generics',2),(7,'Introduction to programming - Recap',2);
/*!40000 ALTER TABLE `quizzes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `submissions`
--

DROP TABLE IF EXISTS `submissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `submissions` (
  `SubID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `QuestionID` int(11) NOT NULL,
  `Answer` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`SubID`),
  KEY `UserID` (`UserID`),
  KEY `QuestionID` (`QuestionID`),
  CONSTRAINT `submissions_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `Users` (`idUser`),
  CONSTRAINT `submissions_ibfk_2` FOREIGN KEY (`QuestionID`) REFERENCES `questions` (`QuestionID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `submissions`
--

LOCK TABLES `submissions` WRITE;
/*!40000 ALTER TABLE `submissions` DISABLE KEYS */;
INSERT INTO `submissions` VALUES (4,16,7,'This is a comment aimed at the human reader. Java ignores such comments.');
/*!40000 ALTER TABLE `submissions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-08-10 16:22:08
