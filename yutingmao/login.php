<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8" />
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<!--[if IE 9]>
		<link rel="stylesheet" type="text/css" href="css/ie9.css" />
	<![endif]-->
	<!--[if IE 8]>
		<link rel="stylesheet" type="text/css" href="css/ie8.css" />
	<![endif]-->
	<!--[if IE 7]>
		<link rel="stylesheet" type="text/css" href="css/ie7.css" />
	<![endif]-->
</head>
<body>
	<div id="header">
		<div><a href="index.html"><img src="未命名.JPG" alt="Image" width="262" height="135" /></a>
			<div id="logo">
				<a href="index.html"></a>			</div>
			<div id="navigation">
				<div>
					<ul>
						<li><a href="index.html">Home</a></li>
						<li class="current"><a href="about.html">About us</a></li>
						<li><a href="contact.html">Contact Us</a></li>
						<li><a href="video.html">Video</a></li>
						<li><a href="instrument.html">Instrument</a></li>
					</ul>
				</div>
			</div>
	  </div>
	</div>
	
	<div id="content"><div>
	  <h3>Log in </h3>
			<p>&nbsp;</p>
			<form action="handle_login.php" id="register" method="post" >
				<div class="first">
					<fieldset>
						<label for="name"></label>
						<label for="email"><strong><br>
						<br>
						Email:</strong></label>
						<input type="text" maxlength="55" name="email" class="inputtext" />
						<label for="password"><strong>Password:</strong></label><input type="password" maxlength="55" name="password" class="inputtext" />
					 <!-- 	<label for="secrity"><strong>Security Code: </strong></label>
						<p><br>
						   <input type="text" maxlength="55" name="imgcode" class="inputtext0" />
					      <br>
				          <img  src="code.php"  width="189" height="30px" border="0" ></p>
						<p> -->
						  <input name="Login" type="submit" value=" LOGIN "  />
		            </p>
					</fieldset>
				</div>
	  </form>
		</div>
	</div>
	<div id="footer">
	  <div></div>
	</div>
</body>
</html>