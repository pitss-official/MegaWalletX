# MEGA WALLET X : PHP7 AND REACT BASED WALLET APP
##### Author: Pawan Kumar and Anukriti Gupta
> A **Single Page Wallet Application** based on **Object Oriented PHP 7 Design** and **React**, React Router and Redux Based Application
#### Features of Wallet Application
- [x] Send and Receive Money
- [x] Single Page Application with offline support using service worker (to be enabled in index.js)
- [x] Can serve as payment gateway using blind payment address (payment api urls)
- [x] Schedule future transactions
- [x] Loan Request and Approve (through Admin)
- [x] Multi User Level Architecture (Admins and Users)
- [x] Mobile Friendly Responsive Architecture
- [x] Gift Cards issue and redeem
- [x] Dual Entry Accounting Methodology
- [x] Login, Register and Profile Update Support
---
Backend
---
> The whole project is completely written in Object Oriented Design pattern. 
> We have written our own framework that is very much similar to the Laravel Framework.
> We call this framework '**Nu**' Framework.

##### Directory Structure of Backend
![ Directory Structure of Backend ](https://raw.githubusercontent.com/pitss-official/MegaWalletX/master/screenshots/backend.png)
###### Life Cycle of a Request in this application
- [x] index.php serves as entry point of all the application
- [x] application bootstrapper is called in bootstrap.php
- [x] class autoloader is called in bootstrap.php
- [x] application environment class is constructed
- [x] router is constructed
- [x] routes are registered
- [x] middleware is constructed and evaluated
- [x] route associated controller class is constructed
- [x] route associated controller method is evaluated
- [x] View class is constructed and returned if view is returned from controller
- [x] dispatcher called and response is converted to json format (if not a View)

#### Features of this framework
1. Controller View Architechture
2. Artisan Like Console Agent called `nu`
3. View Composer
4. Authentication and Middleware Classes
5. Route Evaluator
6. Cron Job Scheduler like Laravel Scheduler
7. Secure DataBase Class using PDO
8. API Ready Architecture using JSON based Request Response
9. Lightweight, Fast and Modular Design
10. Very Less number of Files thus ideal for compact storages (eg. chips of routers, iot devices)

#### Documentation of our Framework
##### Controllers
Unlike MVC framework where model interacts with the database, our application uses
controller based interaction with the database. So each class has to extend the Database class.
Example:
```php
<?php 
namespace Controller;
use System\DataBase;
class MyController extends DataBase{

}
```
##### Routes
To register a route, we have to define it under `routes/webRoutes.php`
Example:
```php
<?php
use System\Router;
Router::get('/my-route','MyController','controllerMethodToHandleRequest');
```
##### Middleware Classes
You can make your own middleware classes to serve as mediator to control requests and 
perform actions like dropping an un-authorized request. It has two entries in the whole life cycle.
One at Request stage and one at the response stage.
Example our Auth Class:
```php
<?php
namespace Middleware;
class Auth extends Middleware{
    protected static function isAuthenticated(){
        // serves as entry point   
        // return true if you want to accept the request
        // false if drop the request with unauthorized response 
    }
    public function dispatch(){
        // this function is called by the dispatcher before responding back to the request
        // here you can control the response by returning a false and a failed response view
        // or proceed the response by returning true
    }
}
```
To apply the middleware to a route, we have to register it under `routes/webRoutes.php`
Example:
```php
<?php
use System\Router;
use Transmission\Middleware;
Middleware::get('/my-route','MyController','controllerMethodToHandleRequest')->apply(\Middleware\Auth::class);
```
##### Nu's View template compiler
Similar to blade template compiler, we have developed our own Template Compiler called **Nu Template Compiler**
For now, it works as a html + php code combined template and doesn't parse any special notation.
> All View Files follow a convention of name. Each view file should be named as mypage.view.php and should be placed inside
> views directory. All view file can extend another view file or a component (a section of view file). All the components
> should be placed under components directory  

Example:`home.view.php`
```php
<?php namespace Frontend;?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">             
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Home Page</title>
</head>
<body>
    <header>
        <p>I am Header and may contain a logo</p>
    </header>
    <?= $name ?>
    <footer>
        <p>I am Footer</p>
    </footer>
</body>
</html>
```
```php
<?php 
namespace Controller;
use System\DataBase;
use Frontend\View;
class MyController extends DataBase{
    public function index(){
        // it should be noted that if my view is located under sub directory of views folder
        // then we have to use a naming convention similar to laravel
        // example: my view is inside views/app/home/root.view.php
        // then we have to call it like return View::compose('app.home.root');
        return View::compose('home',$data1,$data2,$anyother ... any number of variables );
    }
}
```
However writing up same meta and links or header or footer may be troublesome for high
amount of pages. Thus Nu Template Compiler offer components. 
Each component should be placed inside components directory.
Each Component should name as examplecomponent.component.view.php
Example:
>views/components/header.component.view.php
```php
    <header>
        <p>I am Header and may contain a logo</p>
    </header>
``` 
>views/components/footer.component.view.php
```php
    <footer>
        <p>I am Footer</p>
    </footer>
```
>views/home.view.php
```php
<?php namespace Frontend;?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">             
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Home Page</title>
</head>
<body>
    <?php View::component('header') ?>
    <?= $name ?>
    <?php View::component('footer') ?>
</body>
</html>
```
##### Using Requests inside controller
```php
<?php 
namespace Controller;
use System\DataBase;
use Transmission\Request;
class MyController extends DataBase{
    public function create(Request $request){
        // Request can access any parameter using __get magic method
        // for example there is a form in my html
        // then the value of submitted input element can be accessed
        // using the $request->name of the input tag
        return $request->name_of_parameter_passed;
    }   
}
```
##### .env and Environment Class
You can define all the constants for the application as in Laravel .env file same in `.env` file
present at the root directory. To access the property you can access it using Environment::value("name_of_property)")

Example:
```php
<?php 
namespace Controller;
use System\DataBase;
use System\Environment;
class MyController extends DataBase{
    public function index(){
        // Since Database Class extends the Environment Class
        // All the controllers can access the environment variables in .env file as
        // return parent::value('name_of_application');
        // or to use it anywhere else you can call it like 
        return Environment::value('name_of_value');
    }   
}
```

##### Nu's `nu`console agent
To mimic Laravel's Console Agent, `artisan` we have created our own console agent, called `nu`

It can perform following tasks:
1. Run the application in development mode: run `php nu run`
2. Execute the scheduled jobs as in laravel: run `php nu exec`

---
Frontend
---
Our Framework supports *React.js* and *React Router* through WebPack. It acted very useful for developing 
Mega Wallet X. 

#### Our Directory Structure for Mega Wallet X:
![Directory Hierarchy for Frontend](https://raw.githubusercontent.com/pitss-official/MegaWalletX/master/screenshots/frontend.png)

Wehave used the following dependencies for our project
```javascript 1.8
{
    "dependencies": {
        "@babel/plugin-proposal-class-properties": "^7.2.3",
        "@babel/preset-react": "^7.0.0",
        "mdbreact": "^4.25.5",
        "react": "^16.7.0",
        "react-async-component": "^2.0.0",
        "react-dom": "^16.7.0",
        "react-helmet": "^5.2.0",
        "react-hot-loader": "^4.6.3",
        "react-router-dom": "^4.3.1",
        "react-select": "^3.1.0",
        "sweetalert2": "^9.10.9",
        "toastr": "^2.1.4"
      },
      "devDependencies": {
        "@babel/core": "^7.0.0-rc.1",
        "@babel/plugin-proposal-decorators": "^7.2.3",
        "@babel/plugin-syntax-dynamic-import": "^7.2.0",
        "@babel/preset-env": "^7.0.0-rc.1",
        "@babel/preset-typescript": "^7.1.0",
        "autoprefixer": "^9.4.4",
        "babel-core": "^6.26.3",
        "babel-loader": "^8.1.0",
        "babel-polyfill": "^6.26.0",
        "babel-preset-es2015": "^6.24.1",
        "babel-preset-stage-0": "^6.24.1",
        "css-loader": "^2.1.0",
        "extract-text-webpack-plugin": "^4.0.0-beta.0",
        "file-loader": "^3.0.1",
        "node-sass": "^4.11.0",
        "path": "^0.12.7",
        "postcss-flexibility": "^2.0.0",
        "postcss-loader": "^3.0.0",
        "sass-loader": "^6.0.7",
        "style-loader": "^0.23.1",
        "webpack": "^4.42.1",
        "webpack-cli": "^3.1.2",
        "webpack-dev-server": "^3.1.14"
      },
}
```
> The other dependencies are 
> `Twitter Bootstrap 4`
> `JQuery`
> `Axios`
> `Redux`

##### For installing all the dependinces required for frontend to work
run the following command: `npm install` (Requires node.js to be installed)
##### Blind API Based Payment Call
For example if a user want to send payment to a user with username as abhi-verma
then the user can directly visit `https://megawalletx.xyz/pay/abhi-verma` and directly payment page will open with user selected.
if the user is not found then the user will be asked to select a user with similar handle or name to pay to and thus can be used as payment link.


Glimpse of Our Application
---
##### Landing Page
![MegaWallet X](https://raw.githubusercontent.com/pitss-official/MegaWalletX/master/screenshots/2.png)
![MegaWallet X](https://raw.githubusercontent.com/pitss-official/MegaWalletX/master/screenshots/3.png)
![MegaWallet X](https://raw.githubusercontent.com/pitss-official/MegaWalletX/master/screenshots/4.png)
![MegaWallet X](https://raw.githubusercontent.com/pitss-official/MegaWalletX/master/screenshots/5.png)
##### Authentication Validation
![MegaWallet X](https://raw.githubusercontent.com/pitss-official/MegaWalletX/master/screenshots/6.png)
##### Dashboard with frequently transacted on left pane
![MegaWallet X](https://raw.githubusercontent.com/pitss-official/MegaWalletX/master/screenshots/7.png)
##### Send Money and Recently Sent
![MegaWallet X](https://raw.githubusercontent.com/pitss-official/MegaWalletX/master/screenshots/8.png)
##### Money Sent Response
![MegaWallet X](https://raw.githubusercontent.com/pitss-official/MegaWalletX/master/screenshots/8_.png)
##### Add Money to Wallet
![MegaWallet X](https://raw.githubusercontent.com/pitss-official/MegaWalletX/master/screenshots/9.png)
##### My Transactions
![MegaWallet X](https://raw.githubusercontent.com/pitss-official/MegaWalletX/master/screenshots/10.png)
##### Send Money
The select box uses MDBReact Select box so user can see the search results by typing into the box or can select user name from the list.
The user can also enter the username of the target user directly.
![MegaWallet X](https://raw.githubusercontent.com/pitss-official/MegaWalletX/master/screenshots/11.png)
##### Send Gift Card Module
![MegaWallet X](https://raw.githubusercontent.com/pitss-official/MegaWalletX/master/screenshots/12.png)
##### Response of Gift Card
![MegaWallet X](https://raw.githubusercontent.com/pitss-official/MegaWalletX/master/screenshots/13.png)
##### Cron Job Execution using `php nu exec`
![MegaWallet X](https://raw.githubusercontent.com/pitss-official/MegaWalletX/master/screenshots/cron_job_scheduler.png)
