<?php
	require_once("captcha_helper.php");
	$CAPTCHA_DIR = 'captcha/';
	// Delete all captcha first
	if(is_dir($CAPTCHA_DIR))
	{
		$files = glob($CAPTCHA_DIR."*");
		foreach($files as $file)
		{
			//echo $file;
			if(is_file($file))
				unlink($file);
		}
		// Finally remove it
		rmdir($CAPTCHA_DIR);
	}
	mkdir($CAPTCHA_DIR,0711);
	// Generate the words on the captcha
	$pool="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
	$word=substr(str_shuffle($pool),0,6);

// Generate captcha
$config = array(
	'word' => $word,
	'img_path' => $CAPTCHA_DIR,
	'img_url' => $CAPTCHA_DIR,
	'img_width' => 250,
	'img_height' => 80,
	'font_path' => './AHGBold.ttf'
);
$captcha = create_captcha( $config );

/*	$vals = array(
    'word'	=> 'Random word',
    'img_path'	=> $CAPTCHA_DIR,
    'img_url'	=> $CAPTCHA_DIR,
    'font_path'	=> './AHGBold.ttg',
    'img_width'	=> 150,
    'img_height' => 30,
    'expiration' => 7200
    );

$cap = create_captcha($vals);*/

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>A Demo iReserve Page</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	</head>
<body>
	 <div class="container-fluid">
	 	<div class="row" style="background-color:#D8D8DC">
	 		 <div class="col-sm-12">
	 		 	<h1>Reserve and Pick Up</h1>
	 		 </div>
	 	</div>
	 </div>
	 <div class="container" style="padding-top:30px;">
		<div class="row">
			<div class="col-sm-6">
				<form class="form-horizontal">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
    </div>
  </div>
  
  <div class="form-group">
    <label for="captchaInput" class="col-sm-2 control-label">Captcha</label>
    <div class="col-sm-10">
      <div><?php echo str_replace("<img", "<img id='captcha' ",$captcha["image"]); ?></div>
      <input type="text" class="form-control" id="captchaText">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary btn-lg">Continue</button>
    </div>
  </div>
</form>
			</div>

			<div class="col-xs-6">
				<img src="./img/appleman.jpg" style="width:600px"/>
			</div>
		</div>
	 </div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>

</html>