# aotca

README.md

1.	Install MAMP 4.1.1 (Downloading the free version will be suffice. MySQL and PHP will automatically be installed)

2.	Once it has installed, open the application and click “Preferences” then “Ports” on the navigation bar. If Apache Port and MySQL Port is not 8888 and 8889 respectively, change it so it is

3.	Next click “Start Servers” (MySQL and Apache Server should both be checked on the upper right hand corner)

4.	Navigate to the htdocs folder inside the MAMP application folder
<br /> a.	eg. It should be in the directory /Applications/MAMP/htdocs

5.	Git clone the repository into the htdocs folder by navigating to the directory in terminal and pasting the following command.
<br /> a.	Git clone https://github.com/altitudelabs/aotca.git

6.	Next go to localhost:8888/phpmyadmin

7.	Create a new database by clicking on the “New” button in the top left hand corner and name it “aotca”.

8.	Next click on the “aotca” database you just created on the left sidebar and click import on the navigation bar

9.	Click choose file and navigate to the “aotca” folder inside the htdocs folder. Look for a file called “aotca.sql” and click open

10.	Click “Go” at the bottom. If everything went well, you should be greeted with a green status message

11.	Next click on the database and navigate to a table on the left sidebar called “wp_options”. Click on “Browse” near the top and change the option_values of option_id 1 and option_id 2 to http://localhost:8888/aotca  by double clicking it

12.	Next navigate to localhost:8888/aotca (It should prompt you to a wordpress configuration setup page)

13.	When prompted to enter in details, enter the following details
<br /> a.	Database: aotca
<br /> b.	Username: root
<br /> c.	Password: root

14.	Click next and run the installation.

15.	Login with the following details
<br /> a.	Username: ryan.to
<br /> b.	Password: Ryan1997



***Deploy***

*staging*
```
  cd <Project>
  bash deploy/staging
```
