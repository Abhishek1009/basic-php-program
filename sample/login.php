<?php include "includes/header.php"; ?>

<div>
<?php include "includes/navbar.php"; ?>

    
<?php
    

    
    ?>
<div class="container">
    <div class="row"></div>
    <div class="row">
        <div class="col-lg-3 col-md-3"></div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="panel panel-login" style="background-color: yellow">
                <div class="panel-heading" style="padding:6px;margin:0px">
                    <div class="row" style="background-color:#fff;padding:0px;margin:0px" >
							<div class="col-xs-6" style="text-align: center;">
                                <a href="login.php" style="font-size: 17px;font-family: Times New Roman, Times, serif;" class="active">Login</a>
							</div>
							<div class="col-xs-6" style="text-align: center;">
								<a href="register.php" style="font-size: 17px;font-family: Times New Roman, Times, serif;">Register</a>
							</div>
						</div>

                </div>
                <div class="panel-body" style="background-color: #874591">
                    <div id="test-swipe-1" class="row">
                        <div class="col s12">
                            <form class="col s12" method="post" action="login.php">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="email_login" type="email" class="validate" name="email_login" required>
                                        <label for="email_login" data-error="wrong" data-success="right">Email</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <input id="password_login" type="password" class="validate" name="password_login" required>
                                        <label for="password_login" data-error="wrong" data-success="right">Password</label>
                                    </div>
                                    <div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="" name="remember_login" id="remember_login">
										<label for="remember_login"> Remember Me</label>
									</div>
                                    <div class="form-group">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <input type="submit" name="submit_login" id="submit_login" tabindex="4" class="form-control btn btn-login" value="Log In">
                                        </div>
									</div>
                                    <div class="row"></div>
                                    <div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a href="recover.php" tabindex="5" class="forgot-password">Forgot Password?</a>
												</div>
											</div>
										</div>
									</div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3"></div>
    </div>   
</div>
    
    
</div>
<?php include "includes/footer.php"; ?>