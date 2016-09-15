<?php


	//var_dump($_GET);
	
	//echo "<br>";
	
	//var_dump($_POST);
	$signupEmailerror="";
	
	//kas keegi vajutas nuppu ja see on olemas
	if (isset($_POST["signupEmail"]))	{
		
		if (empty ($_POST("signupEmail"))) 
			$signupEmailerror="v2li on kohustuslik";
		
	}
	if (isset($_POST["signupPassword"]))	{
		
		if (empty ($_POST("signupPassword"))) 
			$signupPassworderror="v2li on kohustuslik";
		
	}	else	{
		//parool ei olnud tyhi
		if (strlen($_POST("signupPassword")) < 8 ) (
			$signupPassworderror = "Parool peab olema v2hemalt 8 t2hem2rki pikk")
	}
	
	
	
	

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Sisselogimise leht</title>
	</head>
	<body>

		<h1>Logi sisse</h1>
		<form method="POST">
			<input name="loginEmail" placeholder="email" type="email">
			<br><br>
			<input name="loginPassword" placeholder="parool" type="password">
			<br><br>
			<input type="submit" value="logi sisse">
		</form>
		<h1>Registeeri</h1>
		<form method="POST">
			<input name="signupEmail" placeholder="email" type="email"> <?php echo $signupEmailerror?>
			<br><br>
			<input name="signupPassword" placeholder="parool" type="password">
			<br><br>
			<input type="submit" value="registeeri">
		</form>
			

	</body>
</html>