# FHIR_Scenario2

## Description

This is our submission for the FHIR Hackathon and Scenarios 2. 
We have created a prototype of the web-based app for the patient to use. There are different features, including a speech-to-text transcription.

## Setting up the Database
#### In order to test the prototype, the database needs to be locally set-up on the user's machine. Instructions are as follow:
To create a database, you first need to download and install XAMPP, which is a free and open-source cross-platform web server solution stack package. Once XAMPP is installed, you can start the Apache and MySQL services through the XAMPP control panel.

Next, open a web browser and navigate to http://localhost/phpmyadmin to access the phpMyAdmin interface. phpMyAdmin is a free software tool written in PHP, intended to handle the administration of MySQL over the Web.

In phpMyAdmin, click on the "Databases" tab, enter a name for your new database (for example, "scenario_2"), and click "Create". This will create a new database.

To create a table in the database, select the database you just created from the left-hand side panel, enter a name for your table (for example, "users"), specify the number of columns you need, and click "Go". 

In the next screen, you can define the structure of your table by specifying the name, type, and other attributes of each column. For example, you might have columns for id, name, NHSnumber, and password.

Finally, to connect to your database from your PHP script, you can use the mysqli_connect() function with the following parameters: "localhost" (the hostname), "root" (the username), "" (the password), and "scenario_2" (the database name). This will return a connection object that you can use to execute SQL queries.

Please note that this is a basic setup intended for local development and testing. For a production environment, you would need to take additional steps to secure your database, such as setting a password for the MySQL root user and using a secure connection.
