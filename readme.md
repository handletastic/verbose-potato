#Notes on all the files
##This file
In this file notes are added as the project progresses to illustrate the development process and to act like footnotes for each script. The notes are organised according to directories
##directory: top level
This is the main directory of the website
###index.php
This is the main index file of the website
####mail.php
This page will be used to handle data from the contact page.
####notes.md
This file
####register.php
This page will be used to create user accounts
####search_result.php
This page will display search results
####store.php
This is the main page to display product catalogue

##directory: ajax
PHP files in this directory handles ajax requests from the client side, done via jquery (see scripts.js in the "js" directory). It is good practice to put all the ajax request handlers in the same directory to be able to easily manage them and secure them should it be required.

##directory: includes
Files in this directory are included in other files.

####dbconnection.php
Include this file to when database connection is needed. For this project, this file is included in head.php, which is the head section of every html document in this website.
