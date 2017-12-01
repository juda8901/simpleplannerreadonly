# Simpleplanner
## A Web Application to help Boulder residents create, manage, and attend nearby events.


## Database Information:
Hostname - us-cdbr-iron-east-05.cleardb.net  
Database name - heroku_e401b770a2d2a6f  
Username - b3f2f5de81a83a  
Password - d382b515  

To access the database type the following command into your terminal and enter the password above when prompted  
    <p>sudo mysql -u b3f2f5de81a83a -h us-cdbr-iron-east-05.cleardb.net -D heroku_e401b770a2d2a6f -p</p>
    
You can also log in to the database [here](http://www.phpmyadmin.co) with the credentials from above, but be careful of doing something you aren't sure about.

Your PHP script to connect should look like this  
$url = parse_url(getenv("CLEARDB_DATABASE_URL"));  

$server = $url["host"];  
$username = $url["user"];  
$password = $url["pass"];  
$db = substr($url["path"], 1);  

$conn = new mysqli($server, $username, $password, $db);