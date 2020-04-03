<?php namespace Frontend;

use Middleware\Auth; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php View::component('global.meta') ?>
    <title><?=env('name')?></title>
    <?php View::component('global.files.links');?>
    <link href="/public/css/home.css" rel="stylesheet">

</head>

<body class="fix-header">
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
</div>
<?php View::component('home.login');?>
<?php View::component('home.register');?>
<?php View::component('home.forgotpassword');?>
<?php View::component('home.dynamicjs')?>


<div id="main-wrapper">
    <header class="topheader" id="top">
        <div class="fix-width">
            <nav class="navbar navbar-expand-md navbar-light p-l-0">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                <a class="navbar-brand" href="/"><h1><strong><?= env('name') ?></strong></h1></a>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ml-auto stylish-nav">
                        <li class="nav-item"> <a class="nav-link" href="../Documentation/document.html" target="_blank">Documentation</a> </li>
                        <li class="nav-item"> <a class="m-t-5 btn btn-info font-13" data-toggle="modal" onclick="checkLogin()" data-target="#login-modal" href="#" style="width:120px;"><?=Auth::isAuthenticated()?'DASHBOARD':'LOGIN'?></a> </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="fix-width">
                <div class="row banner-text">
                    <div class="col-lg-5 m-t-20">
                        <h1>The Most Beautiful &amp; Powerful <span class="text-info">Wallet Application</span><br> based on Our PHP7 based <b>Nu Framework</b> and React.js</h1>
                        <p class="subtext"><span class="font-medium">Payments</span> has now become easier with <span class="font-medium">Mega Wallet </span> based on<span class="font-medium">PHP7 and React.js</span> which is a <span class="font-medium">Single Page Application.</span> It is fully responsive admin dashboard template built with Bootstrap Framework, HTML5 & CSS3, Media query. </p>
                        <div class="down-btn"> <a href="#" class="btn btn-info m-b-10">PHP7 Nu Framework by Pawan and Anukriti</a> <a href="#" class="btn btn-success m-b-10">React.JS</a> </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="hero-banner">
                            <img src="/public/assets/theme.svg" style="width: 42vw"/>
</div>
                    </div>
                </div>
            </div>
            <div class="row white-space">
                <div class="col-md-12">
                    <div class="fix-width icon-section"> <small class="text-info">ALMOST COVERED EVERYTHING</small>
                        <h2 class="display-7">Amazing Features & Flexibility Provided</h2>
                        <div class="row m-t-40">
                            <div class="col-lg-3 col-md-6">
                                <h4 class="font-500">Single Page Application</h4>
                                <p>A single-page application works in the browser and requires no page reloads and no extra time for waiting. The page doesn’t need to be updated since content is downloaded automatically.</p>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <h4 class="font-500">VC Architecture Support</h4>
                                <p> It provides faster development process as in VC; one programmer can work on the view while other is working on the controller to create the business logic for the web application.</p>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <h4 class="font-500">Authentication</h4>
                                <p>Authentication is the most important factor in a web application, and developers need to spend a lot of time writing the authentication code. Our Nu Framework contains an inbuilt authentication system.</p>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <h4 class="font-500">Performance and flexibility</h4>
                                <p>A competitive SPA usually transfers all of its UI to the client, thanks to its JavaScript SDK of choice (Angular, JQuery, Bootstrap, or any such). This is often good for network performance</p>
                            </div>
                        </div>
                        <div class="text-center">
                            <a data-toggle="modal" data-target="#register-modal" onclick="checkLogin()" href="#" class="btn btn-lg btn-success m-t-40"> Register Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row light-blue">
                <div class="col-md-12">
                    <div class="fix-width text-center">
                        <h2 class="display-7">What users say about Mega Wallet X</h2>
                        <div class="tesimonial-box owl-carousel owl-theme" id="owl-demo2">
                            <div class="item">
                                <p class="testimonial-text"><b class="font-500">The free wallet to support the developer. It’s a great, lightweight!</b> </p>
                                <div class="username"><b>Nick Stanbridge<br/><small class="text-danger"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></small></b></div>
                            </div>
                            <div class="item">
                                <p class="testimonial-text"><b class="font-500">This wallet has helped me a lot in payments, it is worth!</b> </p>
                                <div class="username"><b>Shinwu Ch<br/><small class="text-danger"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></small></b></div>
                            </div>
                            <div class="item">
                                <p class="testimonial-text"><b class="font-500">In my opinion the money you pay for it… Go ahead & give it a try</b> </p>
                                <div class="username"><b>Rohan Sharma<br/><small class="text-danger"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></small></b></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 call-to-action bg-success">
                    <div class="fix-width">
                        <div class="row">
                            <div class="col-md-6 m-t-20 m-b-20"><span>Are you Satisfied with what we Offer?</span></div>
                            <div class="col-md-6 align-self-center text-right"><a data-toggle="modal" data-target="#register-modal" onclick="checkLogin()" href="#" class="btn btn-outline btn-rounded btn-default buy-btn m-t-10 m-b-10">Register Now</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="bt-top btn btn-circle btn-lg btn-info" href="#top"><i class="ti-arrow-up"></i></a>
            <?php View::component('footer');?>
        </div>
    </div>
</div>
<?php View::component('global.files.jsLoadables');?>
</body>
</html>
