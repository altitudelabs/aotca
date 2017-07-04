# aotca


SETTING UP DEVELOPMENT ENVIRONMENT

	1.	Pull files to directory /var/www/html (Apache)
	2.	Recreate database on MySQL 
	⁃	Create an empty database in server’s /phpmyadmin called ‘aotca’
	⁃	Type in command: mysql -p -u user_name database_name < file.sql (replace
	⁃	'user_name', 'database_name', and 'file.sql' with the actual name, use aotca(1).sql)
	⁃	This replicates the data of the old database into the new one
	⁃	Enable permissions, generally speaking 0755 to wp-content folder in order for plugins to work

