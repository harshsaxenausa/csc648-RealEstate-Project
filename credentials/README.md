# Credentials Folder

## The purpose of this folder is to store all credentials needed to log into your server and databases. This is important for many reasons. But the two most important reasons is
    1. Grading , servers and databases will be logged into to check code and functionality of application. Not changes will be unless directed and coordinated with the team.
    2. Help. If a class TA or class CTO needs to help a team with an issue, this folder will help facilitate this giving the TA or CTO all needed info AND instructions for logging into your team's server. 


1. Server URL or IP : <b>54.151.14.7</b> || <b>ec2-54-151-14-7.us-west-1.compute.amazonaws.com</b>
2. SSH username : <b>ec2-user</b>
3. SSH password or key: <b>RK.ppk</b>
4. Database URL or IP and port used. : <b>54.151.14.7 port 22</b> for SFTP
    <br><strong> NOTE THIS DOES NOT MEAN YOUR DATABASE NEEDS A PUBLIC FACING PORT.</strong> But knowing the IP and port number will help with SSH tunneling into the database. The default port is more than sufficient for this class.
5. Database username : <b>root</b>
6. Database password : <b>csc648</b>
7. Database name (basically the name that contains all your tables) : gatorhub
8. Instructions on how to use the above information.
     - Please use an FTP client like WinSCP or SSH client like PuTTY to access server files
     - Website Link: <b>54.151.14.7</b>
     - Connect via port <b>22</b>, <b>username : ec2-user</b>, password : use <b>RK.ppk</b> for authentication, found in this folder
     - <b>!!To view database using a GUI, go to 54.151.14.7/phpMyAdmin and login using username : root, password : csc648</b>
