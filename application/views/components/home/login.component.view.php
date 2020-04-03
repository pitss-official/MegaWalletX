<?php namespace Frontend;?>
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="loginmodal-container">
            <h1>Login to <?=env('name')?></h1><br>
            <form action="javascript:tryLogin()" >
                <input type="text" name="user" id="login-username" required placeholder="Username">
                <input type="password" name="password" id="login-password" required placeholder="Password">
                <span><small id="login-error-message" class="text-danger"></small></span>
                <br/>
                <br/>
                <input type="submit" value="Login" name="action" class="login loginmodal-submit">
            </form>
            <div class="login-help">
                <a data-toggle="modal" data-target="#register-modal" href="#" style="width:120px;"><button class="btn btn-success">Register</button></a>
                <a data-toggle="modal" data-target="#forgot-modal" href="#" style="width:120px;"><button class="btn btn-instagram">Forgot Password</button></a>
            </div>
        </div>
    </div>
</div>