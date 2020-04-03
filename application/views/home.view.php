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
                        <h1>The Most Beautiful &amp; Powerful <span class="text-info">Material Design</span> based Admin Dashboard Template</h1>
                        <p class="subtext"><span class="font-medium">Bootstrap 4 </span>Admin Template + Angular cli Starter kit,  <span class="font-medium">Light &amp; Dark</span> Versions, Landing Page, <span class="font-medium">6 Demo</span> Variations, <span class="font-medium">6 Dashboard</span> Variations, <span class="font-medium">100+</span> Integrated Plugins, <span class="font-medium">600+</span> Pages, <span class="font-medium">3000+</span> Font Icons, <span class="font-medium">500+</span> UI Components &amp; much more...</p>
                        <div class="down-btn"> <a href="#demos" class="btn btn-info m-b-10">VIEW DEMOS</a> <a href="https://themeforest.net/item/materialpro-bootstrap-4-admin-template/20203944?ref=MARUTI" class="btn btn-success m-b-10">BUY NOW</a> </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="hero-banner">
                            <img src="/public/assets/theme.svg" style="width: 42vw"/>
</div>
                    </div>
                </div>
            </div>
            <div class="row light-blue">
                <div class="col-md-12" id="demos">
                    <div class="text-center"> <small class="text-info">The Most Beautiful Bootstrap Admin Template</small>
                        <h2 class="display-7">Powerful Admin Template of 2017</h2>
                        <p>Don’t go by our Words, checkout our awesome demos and verify yourself.
                            <br/>You will surely fall in love over the fresh design & brilliant code.</p>
                    </div>
                    <div class="max-width">
                        <div class="row text-center">
                            <div class="col-md-4 m-t-40">
                                <div class="image-box"> <img src="images/material-demo1.jpg" alt="demo1" class="img-responsive" />
                                    <div class="image-overly"> <a class="btn btn-rounded btn-info" href="https://wrappixel.com/demos/admin-templates/material-pro/material/index.html" target="_blank">Live Preview</a> </div>
                                </div>
                                <h5 class="p-20">Main Demo Version</h5> </div>
                            <div class="col-md-4 m-t-40">
                                <div class="image-box"> <img src="images/material-demo2.jpg" alt="demo2" class="img-responsive" />
                                    <div class="image-overly"> <a class="btn btn-rounded btn-info" href="https://wrappixel.com/demos/admin-templates/material-pro/minisidebar/index2.html" target="_blank">Live Preview</a> </div>
                                </div>
                                <h5 class="p-20">Mini Sidebar Demo Version</h5> </div>
                            <div class="col-md-4 m-t-40">
                                <div class="image-box"> <img src="images/material-demo3.jpg" alt="demo3" class="img-responsive" />
                                    <div class="image-overly"> <a class="btn btn-rounded btn-info" href="https://wrappixel.com/demos/admin-templates/material-pro/horizontal/index3.html" target="_blank">Live Preview</a> </div>
                                </div>
                                <h5 class="p-20">Horizontal Demo Version</h5> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row white-space">
                <div class="col-md-12">
                    <div class="fix-width icon-section"> <small class="text-info">ALMOST COVERED EVERYTHING</small>
                        <h2 class="display-7">Amazing Features & Flexibility Provided</h2>
                        <div class="row m-t-40">
                            <div class="col-lg-3 col-md-6"> <img src="images/color-skim.png" alt="Material Pro admin template">
                                <h4 class="font-500">6 Color Schemes</h4>
                                <p>We have included 6 pre-defined color schemes with Material Pro admin.</p>
                            </div>
                            <div class="col-lg-3 col-md-6"> <img src="images/sidebars.png" alt="Material Pro admin template">
                                <h4 class="font-500">Dark &amp; Light Sidebar</h4>
                                <p>Included Dark and Light Sidebar for getting desire look and feel.</p>
                            </div>
                            <div class="col-lg-3 col-md-6"> <img src="images/pages.png" alt="Material Pro admin template">
                                <h4 class="font-500">700+ Page Templates</h4>
                                <p>Yes, we have 6 demos &amp; 120+ Pages per demo to make it easier.</p>
                            </div>
                            <div class="col-lg-3 col-md-6"> <img src="images/ui-component.png" alt="Material Pro admin template">
                                <h4 class="font-500">500+ UI Components</h4>
                                <p>Almost 500+ UI Components being given with Material Pro admin Pack.</p>
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
                    <div class="fix-width text-center"> <small class="text-info">ALMOST COVERED EVERYTHING</small>
                        <h2 class="display-7">What users say about <?= env('name') ?></h2>
                        <div class="tesimonial-box owl-carousel owl-theme" id="owl-demo2">
                            <div class="item">
                                <p class="testimonial-text"><b class="font-500">The free verstemplate to support the developer. It’s a great, lightwe!</b> </p>
                                <div class="username"><b>Nick Stanbridge<br/><small class="text-danger"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></small></b></div>
                            </div>
                            <div class="item">
                                <p class="testimonial-text"><b class="font-500">This front-en and later also help me download finished, it is worth!</b> </p>
                                <div class="username"><b>Shinwu Ch<br/><small class="text-danger"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></small></b></div>
                            </div>
                            <div class="item">
                                <p class="testimonial-text"><b class="font-500">in my opinionorth the money you pay for it… Go ahead & give it a try</b> </p>
                                <div class="username"><b>Mohammed Shameem<br/><small class="text-danger"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></small></b></div>
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
