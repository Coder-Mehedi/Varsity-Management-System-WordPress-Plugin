<?php 

global $wpdb;
$table_prefix = $wpdb->prefix;

$sql_query = ["CREATE TABLE IF NOT EXISTS {$table_prefix}Student
(
ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
StudentId INT(10) UNIQUE,
Name VARCHAR(100),
DateOfBirth Date,
Sex VARCHAR(10),
MobileNumber VARCHAR(15),
Address VARCHAR(255),
FatherName VARCHAR(100),
FatherMobileNumber VARCHAR(15)
)",

"CREATE TABLE IF NOT EXISTS {$table_prefix}User
(
ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Username VARCHAR(255),
Password VARCHAR(255)
)",

"CREATE TABLE IF NOT EXISTS {$table_prefix}Area
(
ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Name VARCHAR(255)
)",

"CREATE TABLE IF NOT EXISTS {$table_prefix}Department
(
ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Name VARCHAR(50)
)",

"CREATE TABLE IF NOT EXISTS {$table_prefix}Subject
(
ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Name VARCHAR(255),
Abbreviation VARCHAR(255),
IDArea INT references Area(ID)
)",

"CREATE TABLE IF NOT EXISTS {$table_prefix}Level(
ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Name VARCHAR(255),
Principle VARCHAR(255)
)",

"CREATE TABLE IF NOT EXISTS {$table_prefix}Grade
(
ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Name VARCHAR(255),
IDLevel INT references Level(ID),
Observation VARCHAR(255)
)",


"CREATE TABLE IF NOT EXISTS {$table_prefix}Attendance
(
ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
IDStudent INT references Student(ID),
Attended VARCHAR(255),
Date VARCHAR(255)
)",

"CREATE TABLE IF NOT EXISTS {$table_prefix}SubjectGrade
(
ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
IDGrade INT references Grade(ID),
IDSubject INT references Subject(ID)
)",

"CREATE TABLE IF NOT EXISTS {$table_prefix}ScoreRecord
(
ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
IDSubject INT references Subject(ID),
IDStudent INT references Student(ID),
FirstTrimester INT,
SecondTrimester INT,
ThirdTrimester INT,
FinalGrade INT,
Year VARCHAR(255)
)"];