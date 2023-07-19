$sql = "CREATE DATABASE potifolio;

CREATE TABLE contacts(
email VARCHAR(64) PRIMARY KEY,
fname VARCHAR(64),
surname VARCHAR(64),
message VARCHAR(128)
);


CREATE TABLE projects(
ID INT(5) PRIMARY KEY AUTO_INCREMENT,
project_name VARCHAR(64)
);

INSERT INTO `projects` (`ID`, `project_name`) VALUES (NULL, 'Notepad');
INSERT INTO `projects` (`ID`, `project_name`) VALUES (NULL, 'Advanced Calculator');
INSERT INTO `projects` (`ID`, `project_name`) VALUES (NULL, 'Online Shopping System');
INSERT INTO `projects` (`ID`, `project_name`) VALUES (NULL, 'Mobile app');
INSERT INTO `projects` (`ID`, `project_name`) VALUES (NULL, 'Voting System');
INSERT INTO `projects` (`ID`, `project_name`) VALUES (NULL, 'Calender');
INSERT INTO `projects` (`ID`, `project_name`) VALUES (NULL, 'Weather Prediction System');


CREATE TABLE skills(
ID INT(5) PRIMARY KEY AUTO_INCREMENT,
skill VARCHAR(64),
skill_type
);

INSERT INTO `skills` (`ID`, `skill`, `skill_type`) VALUES (NULL, 'Programming in C', 'main');
INSERT INTO `skills` (`ID`, `skill`, `skill_type`) VALUES (NULL, 'Web Development', 'main');
INSERT INTO `skills` (`ID`, `skill`, `skill_type`) VALUES (NULL, 'Database Designing', 'main');
INSERT INTO `skills` (`ID`, `skill`, `skill_type`) VALUES (NULL, 'PC Maintenance', 'main');
INSERT INTO `skills` (`ID`, `skill`, `skill_type`) VALUES (NULL, 'UX design', 'main');
INSERT INTO `skills` (`ID`, `skill`, `skill_type`) VALUES (NULL, 'Working with Command line', 'other');
INSERT INTO `skills` (`ID`, `skill`, `skill_type`) VALUES (NULL, 'Photoshopping', 'other');
INSERT INTO `skills` (`ID`, `skill`, `skill_type`) VALUES (NULL, 'Dancing', 'other');
INSERT INTO `skills` (`ID`, `skill`, `skill_type`) VALUES (NULL, 'Cooking', 'other');
";

$conn = new mysqli('localhost', 'root', '');
if($conn->query($sql)){
    echo "database is all set";
}

$conn->close();
