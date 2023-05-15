# Part 1: Laravel Installation
Screenshot of the running server.

![screenshot of the running server](https://github.com/obaydullaa/Php-And-Laravel/assets/41355030/2e2b5cce-b715-4ed9-8fcc-0aa4108a9369)

# Part 2: Laravel Folder Structure
Describe the purpose of each of the following folders in a Laravel project:

**app:** It is the application folder and includes the entire source code of the project. It contains events, exceptions and middleware declaration. 

**config:** The config folder includes various configurations and associated parameters required for the smooth functioning of a Laravel application.

**database** As the name suggests, this directory includes various parameters for database functionalities. It includes three sub-directories as given below −

    Seeds: This contains the classes used for unit testing database.

    Migrations: This folder helps in queries for migrating the database used in the web application.

    Factories: This folder is used to generate large number of data records.


**public:** It is the root folder which helps in initializing the Laravel application. It includes the following files and folders −
     
    htaccess: This file gives the server configuration.

    javascript and css: These files are considered as assets.

    index.php: This file is required for the initialization of a web application.


**resources:** Resources directory contains the files which enhances your web application. The sub-folders included in this directory and their purpose is explained below -

    assets : The assets folder include files such as LESS and SCSS, that are required for styling the web application.

    lang : This folder includes configuration for localization or internalization.

    views : Views are the HTML files or templates which interact with end users and play a primary role in MVC architecture.


**routes:** All the application routes are registered within the app/routes.php file. This file tells Laravel for the URIs it should respond to and the associated controller will give it a particular call. 

**storage:** This is the folder that stores all the logs and necessary files which are needed frequently when a Laravel project is running. The sub-folders included in this directory and their purpose is given below −

    app − This folder contains the files that are called in succession.

    framework − It contains sessions, cache and views which are called frequently.

    Logs − All exceptions and error logs are tracked in this sub folder.


**tests:** All the unit test cases are included in this directory. The naming convention for naming test case classes is camel_case and follows the convention as per the functionality of the class.

**Vendor:** Laravel is completely based on Composer dependencies, for example to install Laravel setup or to include third party libraries, etc. The Vendor folder includes all the composer dependencies.

In addition to the above mentioned files, Laravel also includes some other files which play a primary role in various functionalities such as GitHub configuration, packages and third party libraries.



# Screenshot of the running route.

![Screenshot of the running route](https://github.com/obaydullaa/Php-And-Laravel/assets/41355030/8bf4f851-8e84-47e2-a373-41686853b882)
