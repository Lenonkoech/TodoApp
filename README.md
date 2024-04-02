# TodoApp web based Application
Welcome to TodoApp web based application.It provides a good and appealing client side and admin side view.
Additionally it has various functionalities to enabale a user to manage various day to day tasks.
It is built using javascript,php,and CSS with a server side functionality running on xampp.

## Features and functionalities

- **Client side**:
- Add,view and delete tasks.
- Filter tasks to view based on category,Start date and status.
- Manage task categories.
- Add,view and delete categories.
- Login to index.php
 > "Image of the client side view" <img src="/Screenshots/client-side-view.jpg">

- **Admin side**:
- View and delete clients.
- View and delete clients tasks.
- Add new admins to the system.
- Filter and view clients tasks based on category,status and start date.
- Login to dashboard.php
> "Image of the admin side view"<img src="/Screenshots/admin-side-view.jpg">

## Installation

Follow these steps to set up the project on your local machine:

1. ### Prerequisites:

   - Install [XAMPP](https://www.apachefriends.org/index.html) to set up a local development environment.
   - Install [Git](https://git-scm.com/downloads)
   - Configure Your Identity
   - Open terminal and insert
    > git config --global user.name "Your Name"
   - Set your email address globally (also used for all repositories) using the following command on the terminal:
    > git config --global user.email "<you@example.com>"
   - Verify Installation on terminal:
    > git --version
   - Create a GitHub Account:
        If you don’t have one already, create an account on GitHub (<https://github.com/signup>).
2. ### Cloning the repository:

    - On terminal Navigate to your xampp folder in the C drive and go into the htdocs folder:
        >  cd ..\ ..\xampp\htdocs\
    - On terminal run the following command:
        > git clone <https://github.com/Lenonkoech/TodoApp>
    - This will create a folder in the htdocs folder called Real-estate
    - Open the folder with vs code:
        > cd .\TodoApp\
        > code .
    - This will open the project folder on vs code
3. ### Setting up the Database:

    - Open xampp and start Apache and Mysql
    - Press admin on the Mysql section
    - This will open phpmyAdmin on the browser
    - Press new on the left sidebar
    - Under the Database name enter "todoapp" and leave everything default
    - Press create
    - On the left sidebar select todoapp and on the top navigation click import and import the sql file in the project "todoapp.sql"
    - scroll to the bottom and click import
    - this will create the database
4. ### Running the Project:
    - Everytime you want to run the project open xampp and make sure Apache and mySQL is running
    - On the browser enter the path to the project
        > <http://localhost/project/>

## Contribution

Follow these steps if you want to contribute or change anything to the project

1. **Create a git branch**:
    - For the purposes of contributing to the project create a branch
    - Navigate to the directory of the project on terminal
    > cd ..\ ..\xampp\htdocs\TodoApp
    - Create a new branch
    > git checkout -b my-feature-branch (Replace my-feature-branch with a descriptive name for your branch)
    - This will create a branch and put you in your branch
2. **Editing files**
    - Edit files or comment code 
    - Open terminal and navigate to the project folder
    > cd ..\ ..\xampp\htdocs\TodoApp
    - Open the project folder on vs code via the terminal using:
    > code .
    - This will open the project folder on vs code or default code editor
    - Edit code you wish to change or commit
    - On the terminal check git status using
    > git status
    - Add changes to staging area
    > git add -A
    - Commit changes
    > git commit -m"commit message here or what changes you have made"
 -               or
    >git commit
    > this open the vm editor whre rou can write your commit message
    > press key "i" to enter insert mode.
    > On completing writing your commit press "esc" button to exit insert mode.
    > write ":wq" to wite you changes and exit the terminal editor.
    -Push changes to origin main
    > git push origin my-feature branch (replace my-feature branch with the name of your branch)


# If it is to you liking leave a star and follow
_Happy coding Experience 💻_
 __Adios 🖐🏻❤__ 
