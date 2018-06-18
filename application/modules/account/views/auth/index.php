<div class="auth-content">
    <p class="text-center">LOGIN SYSTEM</p>
    <form action="<?php echo site_url('account/auth/login') ?>" method="post" accept-charset="utf-8">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control underlined" name="username" id="username" placeholder="Your username"> 
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control underlined" name="password" id="password" placeholder="Your password"> 
        </div>
        <div class="form-group">
            <label for="remember">
                <input class="checkbox" id="remember" name="remember_me" value="1" type="checkbox">
                <span>Remember me</span>
            </label>
            <a href="<?php echo site_url('account/forgot') ?>" class="forgot-btn pull-right">Forgot password ?</a>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-block btn-primary">Login</button>
        </div>
        <div class="form-group">
            <p class="invisible alertFailed" style="color: #dd0000 !important;">Access denied !</p>
        </div>
    </form>
</div>
