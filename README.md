# OC-Blog
This project is a blog/portfolio project. 
In order to make this project work, you'll need to do the following: 
## Steps
1. Create a new file in the model directory, and name it Config.php
2. Create an absract class Config within it. This class will have 4 protected variables : hostname, username password and dbname. 
These will be needed to access your local database. 
3. Run "php composer install" (it will work with the current version of packages) or if you are bold enough, you can try "php composer update" but I cannot guarantee that the project will work

This should be enough for you to run the project. 
If all steps were respected and you didn't encounter any errors, you should access the project by going on localhost/OC-Blog.