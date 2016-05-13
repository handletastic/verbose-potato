<?php 
include("includes/head.php");
?>
<main class="main">
    <div class="container">
        <div class="row">
            <h2 class="col-md-6 col-md-offset-3">
                <?php echo $sectionname;?>
            </h2>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form id="user-login" class="ajax-form">
                    <div id="email" class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" 
                        name="email" 
                        class="form-control" 
                        id="email" 
                        placeholder="Your Email Address"
                        required>
                    </div>
                    <div id="password" class="form-group">
                        <label for="password">Password</label>
                        <input type="password" 
                        name="password" 
                        class="form-control" 
                        id="password" 
                        placeholder="Your Password"
                        required>
                        <!--add token as hidden field-->
                        <input type="hidden" name="user-token" id="user-token" value="<?php echo $_SESSION["token"];?>">
                    </div>
                    <button type="submit" class="btn btn-default btn-login">Log in</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <p>Don't have an account? <a href="register.php">Sign up</a> for a free account</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <p>Forgot your password? <a href="password-reset.php">Reset your password</a></p>
            </div>
        </div>
    </div>
</main>
<?php include("includes/footer.php");?>