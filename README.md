# Gothic
A PHP MVC framework that provides structure but leaves room for the important: your needs.

### Why?
Too many MVC frameworks focus on offering the widest ammount of features possible. While this has opened the way for very robust solutions, they all end up being monolitic in essence.

### DRY
There is really no need of replacing some of the PHP native features that get constantly replaced on MVC frameworks for the sake of marketing. Gothic doesn't repeat what PHP already implements.

### Visibility
Just as most of frameworks come heavy-packed with features and sugar syntax, they also put the core files away from the developer's gaze and understanding. While this is justified from the perspective of a more clean project setup, it becomes hard to understand how the framework operates under the hood. Gothic has nothing to hide and holds transparency as its main architecture directive.

# Project structure
The project structure for a Gothic project is pretty simple.

```
- app/ - The source files for the application
- docker/ - Docker artifacts for instant development environment setup
- public/ - The compiled files served by the application
- .dockerignore - Contains files that if mounted on Docker would slow things down.
- .env - Contains environment variables used for the local development environment. You can create one from .env.example, adjusting it to your needs
- composer.json - The composer file used for code standards supervision with PHPCS, class autoloading, and vendor PHP dependencies.
- docker-composel.yaml - The local environment setup for Docker through Docker Compose.
- package.json - Contains the NPM dependencies necessary to run the frontend asset management tools.
- webpack.config.js - Holds the webpack configuration that compiles SASS and JS from `app/View/assets` to `public/dist`
```

### docker

Before getting into the main `app` and `public` folders, the `docker` folder is the one that contains the configuration files for easy local development.

##### docker-compose.yaml

The docker compose file contains the configuration for a basic PHP local development server. It includes 4 services: php-fpm for PHP processing, nginx for server management, mariadb as the mysql engine, and phpmyadmin as a tool to view the databases. 

### app

The `app` folder structure derives directly from the MVC architecture, offering a folder for each of its basic building blocks: Controller, Model and View. Since the Router is the 4th essential building block for MVC, there's also a Router folder.

A Gothic project contains all app-related files in the app folder. All the Model files in the Model folder, all the View files in the View folder, all the Routes on the Routes folder, and finally all the Controllers in the Controller folder. There's no need for creating convoluted folder structures that make it difficult to find the files you need and make you remember huge ammounts of file location related information.
```
- app/
  - Controller/ - Where the controller class and the controllers live
    - Controller.php - Base controller class. Extend this to create your controllers easily. Use this to modify all controllers from one point if needed.
    - HomeController.php - An example controller class.
  - Lib/ - Where utility classes live
    - Singleton.php - A Singleton utility class for static classes. Used by many static classes on the project.
  - Model/ - Where the model class and the models live
    - Model.php - Base model interface class. Implement this to create your models easily.
  - Router/  - Where the router class and the route definitions live
    - Router.php - Router class. You can see and modify how the router works here.
  - Test/ - Where the test class and the tests live
    - Test.php - Base test class. Extend this to create your tests easily. Use this to modify all tests from one point if needed.
  - View/ - Where the view class and the templates live
    - View.php - View class. Controlls how the PHP templates are loaded. Injects template inside a default document layout unless specified otherwise.
  - Gothic.php - The main gothic class. Controls the app bootstrap and acts as the kernel for the framework.
```
  
### public
  
The `public` folder is the folder that a webserver points to render the application. For PHP based frameworks, this is needed in order to bypass the default browser-based routing with the app's router.

```
- public/
  - index.php - This file acts as the gateway for the app, it calls for the app bootstrap and defines a security constant that can be used to ensure requests only enter to the app through that point.
  - dist/ - This folder contains the assets compiled by webpack.
    - css/
    - js/
    - fonts/
    - images/
    - ...
```