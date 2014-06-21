CREATE DATABASE binaryquestions;
use binaryquestions;
Create Table tests(
  ID bigint not null AUTO_INCREMENT PRIMARY KEY,
  GeneratedDate date not null
);
CREATE TABLE questions(
  ID bigint not null AUTO_INCREMENT PRIMARY KEY,
  TestID bigint not null,
  Question varchar(200) not null  
);
CREATE TABLE answers(
  ID bigint not null AUTO_INCREMENT PRIMARY KEY,
  QuestionID bigint not null,
  TestID bigint not null,
  Answer bigint not null  
);