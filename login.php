<?php 
	// login j2tab eposti meelde, v2ljad kohustuslikud
	//signup 4 v2lja(oma idee)-esimene kodutoo lisa 2 v2lja(nt kaal ja pikkus)
	//andmete salvestamine ja n2itamine oma idee j2rgi
	require("/home/martreba/config.php");
	//require("functions.php");
	
	// kui on sisseloginud siis suunan data lehele
	if (isset($_SESSION["userId"])) {
		header("Location: data.php");
		exit();
	}
	
	//var_dump($_POST);
	//var_dump(isset($_POST["signupEmail"]));
	
	//var_dump($_GET);
	
	//echo "<br>";
	
	//var_dump($_POST);
	
	//MUUTUJAD
	$signupEmailError = "";
	$signupPasswordError = "";
	$loginEmailError = "";
	$loginPasswordError = "";
	//$checkboxError = "";
	
	
	//kas keegi vajutas nuppu ja see on olemas
	
	if (isset ($_POST["signupEmail"])) {
		
		//on olemas
		// kas epost on tühi
		if (empty ($_POST["signupEmail"])) {
			
			// on tühi
			$signupEmailError = "* Väli on kohustuslik!";
			
		//} else {
			// email on olemas ja õige
			//$signupEmail = $_POST["signupEmail"];
			
		}
		
	} 
	
	if(isset($_POST["loginEmail"])) {
		$loginEmail = $_POST["loginEmail"];
	} else {
		$loginEmail = '';
	}
	
	if(isset($_POST["signupEmail"])) {
		$signupEmail = $_POST["signupEmail"];
	} else {
		$signupEmail = '';
	}
	
	
	if (isset ($_POST["signupPassword"])) {
		
		if (empty ($_POST["signupPassword"])) {
			
			$signupPasswordError = "* Väli on kohustuslik!";
			
		} else {
			
			// parool ei olnud tühi
			
			if ( strlen($_POST["signupPassword"]) < 8 ) {
				
				$signupPasswordError = "* Parool peab olema vähemalt 8 tähemärkki pikk!";
				
			}
			
		}
		
	}
	if (!isset ($_POST["gender"])) {
			
			//error
		}else {
			// annad väärtuse
		}

	
	//vaikimisi väärtus
	$gender = "";
	
	if (isset ($_POST["gender"])) {
		if (empty ($_POST["gender"])) {
			$genderError = "* Väli on kohustuslik!";
		} else {
			$gender = $_POST["gender"];
		}
		
	} 
	
	if (isset ($_POST["loginEmail"])){
		
		if (empty ($_POST["loginEmail"])) {
			
			$loginEmailError = "Väli on kohustuslik";
		}

	}
		if (isset ($_POST["loginPassword"])){
		
		if (empty ($_POST["loginPassword"])) {
			
			$loginPasswordError = "Väli on kohustuslik";
		}
	}
	
	
	if ( $signupEmailError == "*" &&
		 $signupPasswordError == "*" &&
		 isset($_POST["signupEmail"]) && 
		 isset($_POST["signupPassword"]) 
	  ) {
		
		//vigu ei olnud, kõik on olemas	
		echo "Salvestan...<br>";
		echo "email ".$signupEmail."<br>";
		echo "parool ".$_POST["signupPassword"]."<br>";
		$signupEmail = $_POST["signupEmail"];
		$password = hash("sha512", $_POST["signupPassword"]);
	
		
		echo $password."<br>";
		
		signup($signupEmail, $password);
		
		
	}
	
		
		$notice = "";
	//kas kasutaja tahab sisse logida
	if ( isset($_POST["loginEmail"]) && 
		 isset($_POST["loginPassword"]) && 
		 !empty($_POST["loginEmail"]) &&
		 !empty($_POST["loginPassword"]) 
	) {
		
		$notice = login($_POST["loginEmail"], $_POST["loginPassword"]);
		
	}
	
	if (isset ($_POST["check1"])){
		
		echo "";
	} else {		
		
		if (empty ($_POST["check1"])) {
			
			$checkboxError = "Pead olema 18 et siseneda!";
		
		}
	}
		
	
?>
		
			


					
					
<!DOCTYPE html>
<html>
	<head>
		<title>Sisselogimise leht</title>
	</head>
	<body>

		
		<p>Idee on teha midagi sarnast gym trackerile, sarnane on ta ryhmatooga, aga erineb ta ryhmatoost selle poolest, et harjutused ei ole ainult bodyweight.</p>
		
		<h1>Logi sisse</h1>
		<form method="POST" >
			
			<label>E-post</label><br>
			<input name="loginEmail" type="email" value="<?=$loginEmail;?>"> <?php echo $loginEmailError; ?>
			
			<br><br>

			<input name="loginPassword" placeholder="Parool" type="password"> <?php echo $loginPasswordError; ?>
			
			<br><br>
			
			<input type="submit" value="Logi sisse">
		
		</form>
		
		<h1>Loo kasutaja</h1>
		
		<form method="POST">
			
			<label>E-post</label><br>
			<input name="signupEmail" type="email" value="<?=$signupEmail;?>"> <?php echo $signupEmailError; ?>
			
			<br><br>

			<input name="signupPassword" placeholder="Parool" type="password" > <?php echo $signupPasswordError; ?>
			
			<br><br>
					
			<?php if ($gender == "female") { ?>
				<input type="radio" name="gender" value="female" checked> female<br>
			<?php } else { ?>
				<input type="radio" name="gender" value="female" > female<br>
			<?php } ?>
			
			<?php if ($gender == "male") { ?>
				<input type="radio" name="gender" value="male" checked> male<br>
			<?php } else { ?>
				<input type="radio" name="gender" value="male" > male<br>
			<?php } ?>
			
			
			<?php if ($gender == "other") { ?>
				<input type="radio" name="gender" value="other" checked> other<br>
			<?php } else { ?>
				<input type="radio" name="gender" value="other" > other<br><br>
			<?php } ?>
			
			Olen vahemalt 18 aastat vana.<input type="checkbox" name="check1"><br> <?php echo $checkboxError; ?> <br>
			
			<input type="submit" value="Loo kasutaja">
			
			
		
		</form>
		

	</body>
</html>