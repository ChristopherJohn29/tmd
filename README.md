# EHR System

Create a secured database system for The Mobile Drs for their patient’s medical records.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development purposes.

### Prerequisites

What things you need to install the software and how to install them

1. Webserver(MAMP/XAMPP) - To run this project on your local machine
2. Git(you can use any Git software you preferred) - To commit your changes to our central repo.

### Installing

#### Webserver

If you are using Mac, please follow the instruction by clicking thru this [link](https://documentation.mamp.info/en/MAMP-Mac/Installation/)

#### Git (command-line)

If you are using Mac, please follow the instruction by clicking thru this [link](https://www.atlassian.com/git/tutorials/install-git)

### Cloning this project to your local machine

1. Choose the "development" branch from the dropdown list
2. Click the "clone" button on the upper right
3. Choose your preferred setup (HTTP/SSH)
4. Copy the command from the popup window
5. Open up your terminal
6. Locate where the Mamp htdocs are stored
7. Paste the command on your terminal
8. Run your Mamp server
9. Open up your browser and run phpmyadmin
10. Import the database schema file located in ehr_system/database_schema/mobile_drs.sql
11. Open up your browser and type localhost/ehr_system/ to test if all works

If you can't run the project on your local machine, you can email me for help at nikkolaifernandez14@gmail.com

### Library Documentation

1. [Twig template engine](https://twig.symfony.com/doc/2.x/templates.html)

### Workflow

1. [Gitflow](https://nvie.com/posts/a-successful-git-branching-model/)

### File Structure

Below are the list of folders that are safe to touch

- application/controllers (for back-end)
- application/models (for back-end)
- application/libraries (for back-end)
- application/helpers (for back-end)
- application/language (for back-end)
- application/config (for back-end)
- application/views (html pages for web designers)
- dist (assets files for web designers)
- database_schema (backup database schema)

### GIT BASICS

#### Check file update status on command line

git status

#### add files to the staging environment

git add .

the command above tells that add all updated files to the staging.

#### commit the files to the staging environment

git commit -m "PLACE YOUR MESSAGE HERE"

#### push to our central repo

git push origin BRANCH_NAME

ex: git push origin feature-template-design

if it prompts for ssh passkey, just enter it.