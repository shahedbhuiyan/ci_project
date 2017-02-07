<!--
    you can substitue the span of reauth email for a input with the email and
    include the remember me checkbox
    -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>libs/css/style.css">
    <div class="container">
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card">
            	<?php
            	if(validation_errors()){
            		echo validation_errors();
            	}
            	echo "<br>";
            	if(isset($errorLogin)){
            		echo $errorLogin;
            	}
            	?>
            </p>
            <?php 
            	$attributes = array('class'=>'form-signin'); 
            	echo form_open('login/user_login_data_check',$attributes);
            ?>
                <span id="reauth-email" class="reauth-email"></span>
                <?php
                	$username = array(
                		'id' => 'inputEmail',
                		'class' => 'form-control',
                		'name' => 'username',
                		'placeholder' => 'Email address',
                		'required' => 'required',
                		'autofocus' => 'autofocus'
                	);
                	echo form_input($username);

                	$password = array(
                		'id' => 'inputPassword',
                		'class' => 'form-control',
                		'name' => 'password',
                		'placeholder' => 'Password',
                		'required' => 'required'
                	);
                	echo form_password($password);
                ?>
                <!-- <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus> 
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                -->
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>
            <?php echo form_close(); ?>
            <a href="#" class="forgot-password">
                Forgot the password?
            </a>
        </div><!-- /card-container -->
    </div><!-- /container -->
    <script type="text/javascript" src = "<?php echo base_url(); ?>libs/js/script.js"></script>