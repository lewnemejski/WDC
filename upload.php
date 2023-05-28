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
	
	echo '<div id="content" style="text-align:center; font-size:20px;">';
	if(isset($_POST["submit"])) {
	  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	  if($check !== false) {
		$uploadOk = 1;
	  } else {
		echo "Plik nie jest obrazkiem!<br/>";
		$uploadOk = 0;
	  }
	}

	if (file_exists($target_file)) {
	  echo "Plik już istnieje!<br/>";
	  $uploadOk = 0;
	}

	if ($_FILES["fileToUpload"]["size"] > 1000000) {
	  echo "Plik przekracza wielkość 1 MB!<br/>";
	  $uploadOk = 0;
	}

	if($imageFileType != "jpg" && $imageFileType != "png") {
	  echo "Plik nie ma odpowiedniego rozszerzenia!<br/>";
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
	echo '</div><a style="text-decoration:none; color:#ff1744; font-size: 20px;" href="test.php" > Powrót </a></div>
			<div id="footer">
				<footer>
					Copyright &copy; Kacper Wszeborowski Beniamin Samujło
				</footer>
			</div>
		</div>';
		
	if ($uploadOk == 1) 
	{
		$image = [
			'author' => null,
			'title' => null,
			'source' => null,
			'private' => null,
			'_id' => null
		];
		
		if (isset($_POST['znak'])) {
			$author = $_POST['name'];
			$title = $_POST['title'];	
			$source = $_FILES["fileToUpload"]["name"];
			
			$image = [
				'author' => $author,
				'title' => $title,
				'source' => $source,
				'private' => false,
				'auth' => $_SESSION['authorization']
			];
			if(isLogged())
			{
				if($_POST['priv']=="tak")
				{
					$image = [
						'author' => $_SESSION['user'],
						'title' => $title,
						'source' => $source,
						'private' => true,
						'auth' => $_SESSION['authorization']
					];
				}
				else
				{
					$image = [
						'author' => $_SESSION['user'],
						'title' => $title,
						'source' => $source,
						'private' => false,
						'auth' => $_SESSION['authorization']
					];
				}
			}
			addImage($image);
		}
	}
?>
</body>

</html>
