# Willhelm-International
Willhelm International Appointment System

Download and Run XAMPP(make sure it is NOT the VM version) from:
https://www.apachefriends.org/index.html

Locate the XAMPP folder and find htdocs folder
In htdocs folder place the Challenge folder downloaded from this repository
-Run XAMPP and start the Apache Web Server and MySQL Database
-Open command prompt/Terminal and change directory to XAMPP/xamppfiles/bin/
-Execute mysql by using the following command:

mysql -p -u root


Enter the following commands in order:

-Replace user and password with any user and password you would like to login to the database with

GRANT ALL PRIVILEGES ON *.* TO 'username'@'localhost' IDENTIFIED BY 'password';

CREATE DATABASE willhelm;

USE willhelm;




Create the following 4 tables:

create table accounts (username VARCHAR(20) primary key NOT NULL, password VARCHAR(200), firstname VARCHAR(20), lastname VARCHAR(20), type VARCHAR(10));

create table appointments (id INT AUTO_INCREMENT primary key NOT NULL, username VARCHAR(20), date DATE, time TIME, AMPM VARCHAR(2), doctor VARCHAR(20), status VARCHAR(10));

create table medications(medicationID INT AUTO_INCREMENT primary key NOT NULL,name VARCHAR(50),type VARCHAR(20));

create table prescriptions(prescID INT AUTO_INCREMENT primary key NOT NULL, username VARCHAR(20), medicationID INT, dosage VARCHAR(20), startdate DATE, frequency VARCHAR(20), duration VARCHAR(20), status VARCHAR(10));




-Open the DBLogin.php file in the challenge folder in an IDE such as Sublime and change the database username and password to the ones created above
-Save the file




-To create Admin account do the following:
-load site by going to http://localhost/Challenge/homepage.php
-sign up normally but make username 'admin' and choose admin password
-once signed up and confirmed, goto sql and execute the following command:

update accounts set type="Admin" where username="admin";



-Use the website 
