# Willhelm-International
Willhelm International Appointment System

Create the following 4 tables:

create table accounts (username VARCHAR(20) primary key NOT NULL, password VARCHAR(200), firstname VARCHAR(20), last name VARCHAR(20), type VARCHAR(10));

create table appointments (id INT AUTO_INCREMENT primary key NOT NULL, username VARCHAR(20), date DATE, time TIME, AMPM VARCHAR(2), doctor VARCHAR(20), status VARCHAR(10));

create table medications(medicationID INT AUTO_INCREMENT primary key NOT NULL,name VARCHAR(50),type VARCHAR(20));

create table prescriptions(prescID INT AUTO_INCREMENT primary key NOT NULL, username VARCHAR(20), medicationID INT, dosage VARCHAR(20), startdate DATE, frequency VARCHAR(20), duration VARCHAR(20), status VARCHAR(10));
