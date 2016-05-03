	<!--header+heading-->
	<?php 
		include "common.php";
		echo $head;
		echo $bannerarea; 
	// 
		$name=$_GET['name'];
		setcookie("name",$name);
		if(isset($_COOKIE["name"]))
		{
			print('<h1>Here are your  matches, '.$_COOKIE["name"].'!</h1>');
		} 
		else{
			print("<h1>Hi. It appears you haven't been to this site before you may need to <a href='signup.php'>sign up</a> or refresh the page.</h1>");
		}
	
	$search=$_COOKIE["hot"];
	$userSearch= $_GET["name"];
	$lines= file('singles.txt');
	$linea="";
	$nameLine="";
	foreach ($lines as $line) {
		$liner= explode(',', $line);
		if (strpos($line, $userSearch) !== false) {
			setcookie("name", $liner[0]);
			setcookie("gender", $liner[1]);
				if ($_COOKIE["gender"]=="Male") {
					setcookie("hot", 'Female');		
				}
				else if($_COOKIE["gender"]=="Female") {
					setcookie("hot", 'Male');	
				}
				else{
					setcookie("hot", 'Null');
				}
			setcookie("age", $liner[2]);
			setcookie("personality", $liner[3]);
			setcookie("OS", $liner[4]);
			setcookie("seekingagemin", $liner[5]);
			setcookie("seekingagemax", $liner[6]);
		}
		
		if (strpos($line, $search) !== false  && $liner[2]>$_COOKIE['seekingagemin']&& $_COOKIE['seekingagemax']>$liner[2])			
		 {
		if ($liner[5]<$_COOKIE['age']&&$_COOKIE['age']<$liner[6]) 
		{
		if ($liner[4]==$_COOKIE['OS']) {
			$nameLine= $liner[0];
			
			 // $liner[1]."<br>".$liner[2]."<br>".$liner[3]."<br>".$liner[4]."<br>".$liner[5]."<br>";
			if ($_COOKIE["hot"]=="Male") {
			echo " <div class='match' style=\"background-image:url('userm.png');background-repeat: no-repeat;vertical-align:left \">";
			};
			if ($_COOKIE["hot"]=="Female") {
			echo " <div class='match' style=\"background-image:url('user.png');background-repeat: no-repeat;vertical-align:left \">";
			};
			echo "";
			echo "<p style=\"text-align: center \">$nameLine</p>";

			
			echo("<ul>");
			$itemsArray= array('name', 'gender','age','personality','OS','min age','max age');
			for ($i=1; $i < 7; $i++) { 
				echo "<li style=\"text-align: center \"> <strong>$itemsArray[$i]:</strong> \t $liner[$i]</li>";
			}
			echo "</ul>";
			
			echo "</div><br> ";
		}
		}
		}
	
	}


	



	
			include "common.php";
			echo $footer;
	?>