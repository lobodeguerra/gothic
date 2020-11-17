# Gothic
A PHP MVC framework that provides structure but leaves room for the important: your needs.

### Why?
Too many MVC frameworks focus on offering the widest ammount of features possible. While this has opened the way for very robust solutions, they all end up being monolitic in essence.

### DRY
There is really no need of replacing some of the PHP native features that get constantly replaced on MVC frameworks for the sake of marketing. Gothic doesn't repeat what PHP already implements.

### Visibility
Just as most of frameworks come heavy-packed with features and sugar syntax, they also put the core files away from the developer's gaze and understanding. While this is justified from the perspective of a more clean project setup, it becomes hard to understand how the framework operates under the hood. Gothic has nothing to hide and holds transparency as its main architecture directive.

# Dependencies

- Docker
- Docker Compose
- Node & NPM (Please use NVM)

# Start the project

### Prerrequisites

Add this to your hosts file:

```
127.0.0.1   local.gothic.com
```

### Install

Start by cloning the repository at: https://github.com/lobodeguerra/gothic

Once you clone it, set the appropriate Node.js version by opening a terminal on the project folder, and running:

`nvm use`

After doing that, install dependencies by running:

`composer install && npm i`

### Start

To start the project, you just need to run `docker-compose up -d && npm start`.

# Project structure
The project structure for a Gothic project is pretty simple.

```
- app/ - The source files for the application
- docker/ - Docker artifacts for instant development environment setup
- public/ - The compiled files served by the application
- .dockerignore - Contains files that if mounted on Docker would slow things down.
- .env - Contains environment variables used for the local development environment. You can create one from .env.example, adjusting it to your needs
- .nvmrc - Used by NVM to ensure the right Node.js version is used.
- composer.json - The composer file used for code standards supervision with PHPCS, class autoloading, and vendor PHP dependencies.
- docker-composel.yaml - The local environment setup for Docker through Docker Compose.
- package.json - Contains the NPM dependencies necessary to run the frontend asset management tools.
- webpack.config.js - Holds the webpack configuration that compiles SASS and JS from `app/View/assets` to `public/dist`
```

### docker

Before getting into the main `app` and `public` folders, the `docker` folder is the one that contains the configuration files for easy local development.

##### docker-compose.yaml

The docker compose file contains the configuration for a basic PHP local development server. It includes 4 services: php-fpm for PHP processing, nginx for server management, mariadb as the mysql engine, and phpmyadmin as a tool to view the databases. 

##### mysql

Contains the mysql config file.

##### nginx

Contains the nginx config file.

##### php

Contains the php config file and the Dockerfile for the used PHP image.

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
    - assets/ - Assets folder. Contains sass, js, fonts, images, etc.
    - templates/ - Templates folder. Contains the PHP files for the Views markup.
        - layouts/ - Layouts folder. Contains a default layout to be used by the app, and potentially alternative layouts.
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

# Defining routes

Defining a route is very simple. They are defined in `app/Router/routes/web.php` or `app/Router/routes/api.php`. This is of course, completely changable to your tastes. You can use one file or many, and adjust `routes()` on `app/Router/Router.php` to include the files that you need. In this example:

```
// Define routes.
Router::route('/', [\App\Controller\HomeController::class, 'home'], 'GET');
```

The `route` function params are simply a route path, a callback for the route, and a method that the route will use. On this case, the callback comes from a controller class, by passing an array with the source class and the method name. The `GET` method is assumed by default, but displayed here to show that you can use `POST` too.

### Supported methods

PHP only supports `GET` and `POST` so thats what Gothic natively supports. Some frameworks rely on a technique called *method spoofing* to offer additional protocols.

This could be easily achieved with Gothic by adjusting `processRequest()` on `app/Router/Router.php` to catch a param available on `$_REQUEST`, sent through POST. It is not natively included because method spoofing can be superflous in a wide range of projects that do not require a so complex http handling. Gothic's philosophy is to provide the essential, and not to assume this kind of needs.

# Creating a Controller

Creating a controller can be done by extending the base controller class. This practice allows you to keep a single class that can influence all of the controllers in case you need. There's nothing special about a controller class, other than being a class that holds different methods that can be called from the router to match a route with a view, and potentially, use Models in the middle to ineract with a Database.

```
<?php
/**
 * The main home controller class file.
 *
 * PHP version 7.4
 *
 * @category  MVC_Framework
 * @package   Gothic
 * @author    Isaac L. Felix <isaac@lobodeguerra.com>
 * @copyright 2020 Gothic PHP Framework
 * @license   http://www.gnu.org/licenses/gpl-3.0.html GPLv3
 * @link      https://gothic.com
 */

namespace App\Controller;

use App\View\View;

/**
 * The main home controller class.
 *
 * PHP version 7.4
 *
 * @category  MVC_Framework
 * @package   Gothic
 * @author    Isaac L. Felix <isaac@lobodeguerra.com>
 * @copyright 2020 Gothic PHP Framework
 * @license   http://www.gnu.org/licenses/gpl-3.0.html GPLv3
 * @link      https://gothic.com
 */
class HomeController extends Controller
{
    /**
     * Get the root view of the app.
     *
     * @param array $request The request that got us here.
     *
     * @return void
     */
    public function home(array $request)
    {
        View::render('home', ['request' => $request]);
    }
}
```

# Creating a Model

Creating a controller can be done by implementing the Model interface. The Model interface contains a very basic CRUD definition that you can use to implement this functionality. Just as a Controller class uses Models and Views to provide the Router with the appropiate response for a requested route, a Model class would contain both the logic necessary for interacting with the database, and the definition for the relationships that it could potentially have with other models.

```
<?php
/**
 * The main model class file.
 *
 * PHP version 7.4
 *
 * @category  MVC_Framework
 * @package   Gothic
 * @author    Isaac L. Felix <isaac@lobodeguerra.com>
 * @copyright 2020 Gothic PHP Framework
 * @license   http://www.gnu.org/licenses/gpl-3.0.html GPLv3
 * @link      https://gothic.com
 */

namespace App\Model;

/**
 * The main model class.
 *
 * PHP version 7.4
 *
 * @category  MVC_Framework
 * @package   Gothic
 * @author    Isaac L. Felix <isaac@lobodeguerra.com>
 * @copyright 2020 Gothic PHP Framework
 * @license   http://www.gnu.org/licenses/gpl-3.0.html GPLv3
 * @link      https://gothic.com
 */
class Model
{
    /**
     * A var to hold the related DB table name.
     */
    private $_table_name;

    /**
     * A var to hold the related DB table ID column name.
     */
    private $_id_column_name;

    /**
     * Class constructor.
     */
    public function __construct()
    {
    }

    /**
     * Function to create a model on the database.
     *
     * @return boolean
     */
    public function create()
    {
        return false;
    }

    /**
     * Function to read a model on the database.
     * 
     * @param int $object_id The object id on the database.
     *                       If not provided, fetches all.
     *
     * @return boolean
     */
    public function read(int $object_id = null)
    {
        return false;
    }

    /**
     * Function to update a model on the database.
     * 
     * @param int $object_id The object id on the database.
     *
     * @return boolean
     */
    public function update(int $object_id)
    {
        return false;
    }

    /**
     * Function to read a model on the database.
     * 
     * @param int $object_id The object id on the database.
     *
     * @return void
     */
    public function delete(int $object_id)
    {
        return false;
    }
}
```

# Creating a View

To create a View you need to create a new view template (a PHP file that contains HTML markup) in the `app/View/templates` folder. Using subfolders is supported by specifying the path on the `View::render` function.

There are two kinds of templates: *view* templates and *layout* templates. Layout templates are the skeletons that later get hydrated with the content from the views, and they live under the `app/View/templates/layouts` directory. View templates live anywhere you choose inside `app/View/templates` folder.(except for layouts, of course, although possible to have view templates inside the layouts folder, it is strongly recommended to aovid mixing them).

```
<?php
/**
 * The home template file.
 *
 * PHP version 7.4
 *
 * @category  MVC_Framework
 * @package   Gothic
 * @author    Isaac L. Felix <isaac@lobodeguerra.com>
 * @copyright 2020 Gothic PHP Framework
 * @license   http://www.gnu.org/licenses/gpl-3.0.html GPLv3
 * @link      https://gothic.com
 */
?>
<h1>Hello World!</h1>

```

### Rendering a view

A View is often rendered as the end result of a Controller function.

```
/**
 * Get the root view of the app.
 *
 * @param array $request The request that got us here.
 *
 * @return void
 */
public function home(array $request)
{
    // Do the magic here.

    // Render view, passing data to it.
    View::render('home/index', ['request' => $request], 'home');
}
```

The `render` function has 3 parameters: the name of a view template (path is supported as long it is relative to the app/View/templates directory), an array of optional data to pass to the view from the controller, and optionally the name of a layout that is not the default layout. This last parameter is specially useful when creating views that have a different layout than the one used most extensively on the app.

When a view is rendered, a layout is rendered first, and the desired view is injected within that layout. This allows the DRY principle to be maintained. The passed data from the controller will be available to both the layout template and the view template that are being used.

### Creating a layout

To create a layout you need to add a layout template (a PHP file with HTML markup) file inside `app/View/templates/layouts`. Then, you need to call `View::inject($data)` where you will want to display the view template (another PHP file with HTML markup).

```
<?php
/**
 * The main layout file.
 *
 * PHP version 7.4
 *
 * @category  MVC_Framework
 * @package   Gothic
 * @author    Isaac L. Felix <isaac@lobodeguerra.com>
 * @copyright 2020 Gothic PHP Framework
 * @license   http://www.gnu.org/licenses/gpl-3.0.html GPLv3
 * @link      https://gothic.com
 */

use App\View\View;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gothic</title>

    <link rel="stylesheet" href="/dist/css/main.css" />
</head>
<body>
    <header>

    </header>
    <main>
        <?php View::inject($data) ?>
    </main>
    <footer>

    </footer>

    <script src="/dist/js/app.js"></script>
</body>
</html>
```

### Frontend scaffolding

Gothic comes prepared for modern front-end development, by offering a basic webpack setup that can be easily extended and customized to your needs.

- Running `npm start` will start the project in development mode, and open a new window that will be automatically kept up to date through HRM.
- Running `npm run build` will compile assets for deploy.

Gothic, however, neither imposes nor includes any CSS package; rather provides an already setup source JS and SASS files that you can use to quickly begin building using your own packages.

# Contributing

This project is completely open source and licensed under GNU GPL License. Please read the contributing guidelines if you want to collaborate. Gothic is completely open for contributions from all around the world.