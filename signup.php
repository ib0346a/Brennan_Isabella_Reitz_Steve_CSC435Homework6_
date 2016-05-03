	<!--header+heading-->
	<?php 
		include "common.php";
		echo $head;
		echo $bannerarea;
		$website="(Don't know your type?)";
		// define variables and set to empty values
		
		global $Submit;
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		  if (empty($_POST["name"])) {
		    $nameErr = "Name is required";
		    $Submit="error";
		  } 
		  else {
		    $name = $_POST["name"];
		    $Submit="valid";
		    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
			  $nameErr = "Only letters and white space allowed"; 
			  $Submit="error";
			}
			else{
				$Submit="valid";
			}
				//checks to see if profile for name already exists
				$singlesList = file("singles.txt");

				foreach ($singlesList as $value) {
					$comma_separated = implode(",", $singlesList);
					$singlesArray = explode(',', $comma_separated);
				}
				if (in_array($name,$singlesArray)){
					$nameErr = "Profile already exists"; 
				 	$Submit="error";
					}
				else{
					 $Submit="valid";
				}
		  }

		if (empty($_POST["gender"])) {
		    $genderErr = "Gender is required";
		    $Submit="error";
		  } 
		else {
		    $gender = $_POST["gender"];
		    $Submit="valid";
		  }
		

		 if (empty($_POST["age"])) {
		    $ageErr = "Age is required";
		    $Submit="error";
		  } else {
		    $age = (int)$_POST["age"];
		    $Submit="valid";
		 	if (!preg_match("/(1[8-9]|2[0-9]|9[0-9])/",$age)) {
			  $ageErr = "Only ages between 18-99 allowed"; 
			  $Submit="error";
			}
			else{
				$Submit="valid";
			}

		  }

		  if (empty($_POST["personality"])) {
		    $personalityErr = "Personality is required";
		    $Submit="error";
		  } else {
		    $personality = $_POST["personality"];
		    $Submit="valid";
		    if (!preg_match("/^[IE][NS][FT][JP]$/",$personality)) {
			  $personalityErr = "Please use a real personality type"; 
			  $Submit="error";
			}
			else{
				$Submit="valid";
			}

		  }

		   if (empty($_POST["seekingagemax"])) {
		    $seekingagemaxErr = "Max age is required";
		    $Submit="error";
		  } else {
		    $seekingagemax =(int) $_POST["seekingagemax"];
		    $Submit="valid";
		    if (!preg_match("/(1[8-9]|2[0-9]|9[0-9])/",$seekingagemax)) {
			  $seekingagemaxErr = "Only ages between 18-99 allowed";
			  $Submit="error"; 
			}
			else{
				$Submit="valid";
			}
		  }

		   if (empty($_POST["seekingagemin"])) {
		    $seekingageminErr = "Min age is required";
		    $Submit="error";
		  } 
		  else {
		    $seekingagemin = (int)$_POST["seekingagemin"];
		    $Submit="valid";
		    if (!preg_match("/(1[8-9]|2[0-9]|9[0-9])/",$seekingagemin)) {
			 $seekingageminErr = "Only ages between 18-99 allowed"; 
			 $Submit="error";
			}
			elseif(!($seekingagemin<=$seekingagemax)) {
				$seekingageminErr = "Please give a minimum age"; 
		  		$seekingagemaxErr = "Please give a maximum age";
				$Submit="error";
			}
			else{
				$Submit="valid";
			}	   	  
		}
	
		
}
if ($Submit=="valid") {
			$SubmitME="action='signup-submit.php'";
		}
	  
?>
	<!--"signup-submit.php"-->
	<form <?=$SubmitME?> method="post">

		<p>
			<label class="inline right" for "name">Name:</label>
			<input id="name" type="text" name="name" maxlength="16" value=<?=$name?>>
			<span class="error">* <?php echo $nameErr;?></span>
			
		</p>
		<p>
			<label class="inline right" for "gender">Gender:</label>
			<input id="gender" type="radio" name="gender" 
			<?php if (isset($gender) && $gender=="Male") echo "checked";?> value="Male"> Male
	  		<input id="gender" type="radio" name="gender" 
	  		<?php if (isset($gender) && $gender=="Female") echo "checked";?> value="Female"> Female
	  		 <span class="error">* <?php echo $genderErr;?></span>
	  	</p>
		<p>
  			<label class="inline right" for "age">Age:</label>
			<input id="age" type="text" name="age" size="6" maxlength="2" value=<?=$age?>>
			<span class="error">* <?php echo $ageErr;?></span>
		</p>
		<p>
			<label class="inline right" for id="personality">Personality type:</label>
  			<input id="personality" type="text" name="personality" size="6" maxlength="4" value=<?=$personality?>><a href="http://www.humanmetrics.com/cgi-win/jtypes2.asp"><?=$website?></a>
  			<span class="error">* <?php echo $personalityErr;?></span>
  		</p>
		<p>
  			<label class="inline right" for "OS">Favorite OS:</label>
  			<select id="OS" name="OS"><option>Windows</option>
  							<option>Max OS X</option>
  							<option>Linux</option>
  			</select><br>
  		</p>
		<p>
  			<label class="inline right" for "Seekingage:">Seeking age:</label>
  			<input id="seekingagemin" type="text" name="seekingagemin" size="2" maxlength="2" value=<?=$seekingagemin?>>
  			<span class="error">* <?php echo $seekingageminErr;?></span>
  			to 
  			<input id="seekingagemax" type="text" name="seekingagemax" size="2" maxlength="2"  value=<?=$seekingagemax?>>
  			<span class="error">* <?php echo $seekingagemaxErr;?></span>
  			
  		</p>
	<!--	<p>
  			<label class="inline right" for "Photo:">Photo:</label>
  			<input type="file" name="userimage" accept="image/*" value=<?=$userimage?>>
  		
  		</p>-->
		<p>
  			<input type="submit" value="Sign Up">
  		</p>
	</form>

	<!--footer-->
	<?php 
			include "common.php";
			echo $footer;
	?>