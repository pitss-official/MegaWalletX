<?php
use System\Router;
use Transmission\Middleware;
Router::get('/','StaticController','loadHome');
Router::get('/test','DashboardController','test');
Middleware::get('/process/logout','AuthenticationController','logout')->apply(\Middleware\Auth::class);
Middleware::get('/home','DashboardController','view')->apply(\Middleware\Auth::class);

//God Route
Middleware::get('*','DashboardController','view')->apply(\Middleware\Auth::class);


//API or Endpoint Routes
Middleware::post('/endpoint/process/logout','AuthenticationController','logoutAPI')->apply(\Middleware\Auth::class);
Middleware::get('/endpoint/fetch/recent-payments','DashboardController','recentPayments')->apply(\Middleware\Auth::class);
Middleware::post('/endpoint/init/transaction','TransactionController','initTransfer')->apply(\Middleware\Auth::class);
Middleware::post('/endpoint/fetch/payables','DashboardController','availableUsers')->apply(\Middleware\Auth::class);
Middleware::post('/endpoint/fetch/user-real-name','DashboardController','getUserBasicDetails')->apply(\Middleware\Auth::class);
Middleware::post('/endpoint/fetch/my-balance','DashboardController','balance')->apply(\Middleware\Auth::class);
Middleware::post('/endpoint/add-balance','TransactionController','addMoney')->apply(\Middleware\Auth::class);
Middleware::post('/endpoint/generate/card','TransactionController','sendCard')->apply(\Middleware\Auth::class);
Middleware::post('/endpoint/schedule','ScheduleController','addTransaction')->apply(\Middleware\Auth::class);


Middleware::get('/endpoint/fetch/my-transactions','TransactionController','allTransactions')->apply(\Middleware\Auth::class);
Middleware::get('/endpoint/fetch/my-fav','DashboardController','favTable')->apply(\Middleware\Auth::class);

Router::post('/process/register','AuthenticationController','register');
Router::post('/process/login','AuthenticationController','login');