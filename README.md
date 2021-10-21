# Catalogue_MCC_Backend
 
 To use this project on local, you need to lunch you local server (I use Xampp with Apache and MySQL data base). 
 In .env control line 26 you have the right information to connect the API with your MySQL database.
 
 This API run only on local since we have a major bug unresolved. 
 
## Available Scripts

In the project directory, you can run:

### `php composer.phar install`
After cloning the project, run this to install all dependencies. 

## API acces

To acces the API use your local adress and finish with `/public/api`. 
You will have access to all the method. 

### `Error`
We have error on the API that block the front development : error 400 ("hydra:description": "Invalid IRI \"string\"."
Delete and get are not impact by this error. 
 
