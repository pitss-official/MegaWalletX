<?php namespace Frontend;?>
<div class="modal fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="loginmodal-container">
            <h1>Register to <?=env('name')?></h1><br>
            <form id="register-form" action="javascript:processRegister()">
                <input type="text" required name="name" placeholder="Full Name">
                <span><small id="register-error-name" class="text-danger"></small></span>
                <input type="text" required name="username" placeholder="Username">
                <span><small id="login-error-user" class="text-danger"></small></span>

                <input type="number" required name="mobile" placeholder="Mobile Number">
                <span><small id="login-error-mobile" class="text-danger"></small></span>

                <input type="email" required name="email" placeholder="Email Address">
                <span><small id="login-error-email" class="text-danger"></small></span>

                <input type="password" required name="password" placeholder="Password">
                <span><small id="login-error-password" class="text-danger"></small></span>

                <input type="password" required name="confirmPassword" placeholder="Confirm Password">
                <span><small id="login-error-confirmPassword" class="text-danger"></small></span>

                <input type="submit" name="login" class="login loginmodal-submit" value="Process Registration">
            </form>
            <div class="login-help w-100">
                <a href="#" data-dismiss="modal"><button class="btn btn-danger w-100">Cancel</button></a>
            </div>
        </div>
    </div>
</div>