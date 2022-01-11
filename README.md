# Gothic
A minimalistic PHP MVC framework inspired by the Gothic movement, in which structural components were reduced to the minimum to focus on the beauty of stained glass.

## Main Principles

### DRY
There is really no need of replacing some of the PHP native features that get constantly re implemented or abstracted on MVC frameworks. Gothic doesn't repeat what PHP already implements so that you don't repeat yourself.

### KISS
Across the years MVC has become a complicate and intrincate implementation on most PHP frameworks. Keeping things stupid and simple, Gothic aims to get back to the essentials of web development.

### Visibility
Just as most of frameworks come heavy-packed with features and sugar syntax, they also put the core files away from the developer's gaze and understanding. While this is justified from the perspective of a more clean project setup, it becomes hard to understand how the framework operates under the hood. Gothic has nothing to hide and holds transparency as its main architecture directive.

### Pluggability
Why including pre packed features when you can use pluggable modules? Gothic starts slim and grows with your needs. Using Composer and NPM for backend and frontend package handling, there's no need to have any more package managers.

### Updatability
Gothic tries to provide understandable core files that are properly separated from user files so that updating the framework can be an automated process instead of a manual process.

### Extensibility
In order to be pluggable and automatically updatable Gothic needs to be extensible, in a way that protects user customizations from getting unwanted changs from extensions and core files updates.

### Cloud Scalability
A modern MVC framework like Gothic needs to be scalable across cloud services and stay prepared for deployment in this kind of architecture. Gothic pushes for the usage of tools like Docker, Kubernetes, Terraform or any other that would help to make the deployment of a Gothic based app to the cloud a seamless, easy process.

## Installation

### Dependencies

- Docker Desktop
- Node
- NVM

---

Start the containers:
- `docker-compose up -d`

Then install composer dependencies:
- `docker exec gothic_php_1 composer install`

Select node version and install node dependencies:
- `nvm use`
- `npm install`

### Local development

Gothic comes prepared for modern development, by offering a basic webpack + webpack server + postcss setup that can be easily extended and customized to your needs.

- Running `npm start` will start the project in development mode, and open a new window that will be automatically kept up to date through HRM.
- Running `npm run build` will compile assets for deploy.

Gothic neither imposes nor includes any CSS package; rather provides an already setup source JS and SASS files that you can use to quickly begin building using the packages of your choosing.

# Contributing

This project is completely open source and licensed under GNU GPL License. Please read the contributing guidelines if you want to collaborate. Gothic is completely open for contributions from all around the world.
