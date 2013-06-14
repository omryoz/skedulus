
<?php include('meta_tags.php')?>

<div class="content container login_page">

	<div class="row-fluid">

		<center><h1 class="login_logo"><a href="index.php">Skedulus</a></h1></center>
		<div class="social_buttons">
        <div class="inset">
            <a class="fb login_button" href="#">
                <div class="logo_wrapper"><i class="icon-facebook icon-2x"></i></div>
                <span>Login with Facebook</span>
            </a>
        </div>
        <div class="inset">
            <a class="tw login_button" href="#">
                <div class="logo_wrapper"><i class="icon-twitter icon-2x"></i></div>
                <span>Login with Twitter</span>
            </a>
        </div>
    </div>
	
	<hr class="hr_style">
	<div class="row-fluid">
		<div class="span4 offset4 login_form">
		
		<form class="logged" id="form1">
			<input  type="text" class="span12"   placeholder="Email"  >
			<input  type="password" class="span12" placeholder="Password" >
			<a href="business_overview.php" type="submit" class="btn btn-success span4">Log In</a>
			<a href="javascript:;" class="pull-right revert reveall" onClick="$('#form2').toggle();$('#form1').toggle();">Forgot Your Password ?</a>
		</form>
		
		<form  class="reset" id="form2">
		   <input  type="text" class="span12"  placeholder="Email address" >
		   <a href="business_overview.php" type="submit" class="btn btn-success span4">Reset</a>
		   <a href="javascript:;" class="pull-right revert" onClick="$('#form2').toggle();$('#form1').toggle();">Back to login?</a>
		</form>
		
		</div>
	</div>
	</div>
	
</div>
