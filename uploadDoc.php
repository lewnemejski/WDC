<?php
	session_start();
	ini_set('display_errors', 0);
	if (!isset($_POST["submit"]))
	{
		header('Location: index.php');
		exit();
	}
	require "page.php";
	require_once 'functions.php';
	require_once 'business.php';

	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	if (file_exists($target_file)) {
	  echo "Plik już istnieje!<br/>";
	  $uploadOk = 0;
	}

	if ($_FILES["fileToUpload"]["size"] > 1000000) {
	  echo "Plik przekracza wielkość 1 MB!<br/>";
	  $uploadOk = 0;
	}

	if ($uploadOk == 0) 
	{
	  echo "Plik nie został wysłany z powodu błędów.<br/>";
	} 
	else 
	{
	  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		echo "Plik ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " został pomyślnie wysłany.<br/>";
	  } 
	  else 
	  {
		echo "Pliku nie udało się wysłać poprawnie, spróbuj ponownie lub skontaktuj się z <a href='contact.php'>pomocą techniczną</a>.<br/>";
	  }
	}
	echo '</div><a style="text-decoration:none; color:#ff1744; font-size: 20px;" href="Pracownik_pr.php" > Powrót </a></div>
			<div id="footer">
				<footer>
					Copyright &copy; Kacper Wszeborowski s189477
				</footer>
			</div>
		</div>';
		
	if ($uploadOk == 1) 
	{
		$name = $_FILES["fileToUpload"]["name"];
		$who = $_SESSION['employeeAcc'];	
		$source = "uploads/".$_FILES["fileToUpload"]["name"];
			
		$document = [
			'name' => $name,
			'source' => $source,
			'who' => $who
		];

		addDoc($document);
		
	}
?>
</body>
</html>