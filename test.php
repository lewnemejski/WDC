<?php
	session_start();
	require "page.php";
	require_once "functions.php";
?>
	<h3>Wyślij obrazek:</h3>
	<form action="upload.php" method="post" enctype="multipart/form-data">
	
		<?php
			if(isLogged())
			{
				echo '<label for="name"> Autor:</label><br/> <input type="text" value="'.$_SESSION['user'].'" readonly/><br/>';
			}
			else
			{
				echo '<label for="name"> Autor:</label><br/> <input type="text" id="name" name="name" required/><br/>';
			}
		?>
		<label for="title"> Tytuł:</label><br/>
		<input type="text" id="title" name="title" /><br/>
		<label for="znak"> Znak wodny:</label><br/>
		<input type="text" id="znak" name="znak" required /><br/><br/>
		<?php 
			if(isLogged())
			{
				echo'Prywatne?<br/><label for="priv">Tak</label>
				<input type="radio" id="priv" name="priv" value="tak"/><br/>
				<label for="priv1">Nie</label>
				<input type="radio" id="priv1" name="priv" value="nie" checked/><br/><br/>';
			}
		?>
		<input type="file" name="fileToUpload" id="fileToUpload"><br/><br/>
		<input type="submit" value="Upload Image" name="submit">
			
	</form>
	<br/>
	<?php 
		if (isLogged())
		{
			echo "Twoja nazwa użytkownika:<span style='font-weight:bold;'>".$_SESSION['user']."</span><br/> <a style='text-decoration:none; color:#ff1744; font-size: 20px;' href='logout.php' > Wyloguj się </a>";
		}
	?>
	</div>
	
	<div id="footer">
		<footer>
			Copyright &copy; Kacper Wszeborowski s189477
		</footer>
	</div>
	
	</div>

</body>
</html>