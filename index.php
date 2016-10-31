<!DOCTYPE html>
<?php
/*
 * Omnipay DummyNC Driver Call back file
 *
 */
?>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="description" content="DummyNC Redirect Page.">
<meta name="author" content="Benjamin Ellis - benellis@mukudu.net">
<meta name="keywords" content="dummync, gateway, merchant, omnipay, pay, payment">

<title>DummyNC Redirect Page</title>

<!-- Bootstrap core CSS -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<pre>
			<?php print_r($_REQUEST); ?>
			</pre>
		</div>
	</div>


<!--  here we will add a form to have

// success

// fail

// cancel

 -->
 </div><!-- /container -->

	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script	src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/javascript"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>
