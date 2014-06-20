CREATE DATABASE BinaryQuestions;
use BinaryQuestions;
Create Table Test(
  ID bigint not null identity(1,1),
  GeneratedDate date not null
);
CREATE TABLE Questions(
  ID bigint not null identity(1,1),
  TestID bigint not null,
  Quesiton varchar(200) not null  
);
CREATE TABLE Answers(
  ID bigint not null identity(1,1),
  QuestionID bigint not null,
  Answer bigint not null  
);