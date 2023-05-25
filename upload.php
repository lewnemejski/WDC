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
	
	//echo '<div id="content" style="text-align:center; font-size:20px;">';
	if(isset($_POST["submit"])) {
	  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	  if($check !== false) {
		//echo "Plik jest obrazkiem - " . $check["mime"] . "."</br>;
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
					Copyright &copy; Kacper Wszeborowski s189477
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
				'private' => false
			];
			if(isLogged())
			{
				if($_POST['priv']=="tak")
				{
					$image = [
						'author' => $_SESSION['user'],
						'title' => $title,
						'source' => $source,
						'private' => true
					];
				}
				else
				{
					$image = [
						'author' => $_SESSION['user'],
						'title' => $title,
						'source' => $source,
						'private' => false
					];
				}
			}
			
			addImage($image);
		}
		else 
		{
			if (!empty($_GET['id'])) {
				$id = $_GET['id'];
				$image = $db->images->findOne(['_id' => new ObjectID($id)]);
			}
		}
		if($imageFileType == "png")
			{$fsource = imagecreatefrompng($target_dir.$source);}
		else
			{$fsource = imagecreatefromjpeg($target_dir.$source);}
		$width = imagesx($fsource);
		$height = imagesy($fsource);
		
		$new_w = 200;
		$new_h = 125;
		$thumbnail = imagecreatetruecolor($new_w, $new_h);
		imagecopyresampled($thumbnail, $fsource, 0, 0, 0, 0, $new_w, $new_h, $width, $height);
		if($imageFileType == "png")
			{imagepng($thumbnail,$target_dir."thumbs/thumb_".basename($source));}
		else
			{imagejpeg($thumbnail,$target_dir."thumbs/thumb_".basename($source));}
		
		$watermarked = imagecreatetruecolor($width, $height);
		imagecopyresized($watermarked, $fsource, 0, 0, 0, 0, $width, $height, $width, $height);
		$color = imagecolorallocatealpha($watermarked, 117, 117, 117);
		imagettftext($watermarked, 20, 0, $width/2-strlen($_POST['znak']), $height/2, $color, "fonts/arial.ttf", $_POST['znak']);
		if($imageFileType == "png")
			{imagepng($watermarked,$target_dir."watermarks/water_".basename($source));}
		else
			{imagejpeg($watermarked,$target_dir."watermarks/water_".basename($source));}
		unset($fsource);
		unset($thumbnail);
		unset($watermarked);
	}
?>
</body>

</html>
