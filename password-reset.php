<?php 
include("includes/head.php");
?>
<main class="main">
    <div class="container">
        <div class="row">
            <h2 class="col-md-6 col-md-offset-3">
                Reset Your Password
            </h2>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form id="password-reset" class="ajax-form">
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" 
                        name="email" 
                        class="form-control" 
                        id="email" 
                        placeholder="Your Email Address"
                        required>
                    </div>
                    <div class="form-group">
                        <label for="password">Retype your email</label>
                        <input type="email" 
                        name="email2" 
                        class="form-control" 
                        id="email2" 
                        placeholder="Retype your email">
                        <!--add session token as hidden field to help prevent bots registering
                        users automatically-->
                        <input type="hidden" name="user-token" id="user-token" value="<?php echo $_SESSION["token"];?>">
                    </div>
                    <button type="submit" class="btn btn-default btn-register">Reset Your Password</button>
                </form>
            </div>
        </div>
    </div>
</main>
<?php include("includes/footer.php");?>