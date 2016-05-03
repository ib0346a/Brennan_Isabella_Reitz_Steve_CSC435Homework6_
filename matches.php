<?php 
		include "common.php";
		echo $head;
		echo $bannerarea;
?>

	<form action="matches-submit.php" method="get"> 
		<p>
				<label class="inline right" for "name">Name:</label>
				<input id="name" type="text" name="name" maxlength="16"><br>

				<input type="submit" value="View My Matches">


		</p>
	</form>
	<?php
					$name=$_GET['name'];
					setcookie('name',$name);
				?>

<?php 
			include "common.php";
			echo $footer;
?>