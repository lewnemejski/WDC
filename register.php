<?php
	session_start();
	require_once 'functions.php';
	require_once 'business.php';
	
	$user = [
		'name' => null,
		'psw' => null,
		'email' => null,
		'_id' => null
	];
	if (isset($_POST['mail'])) {
		$nick = $_POST['name'];
		$email = $_POST['mail'];	
		$haslo1 = $_POST['psw'];
		$haslo2 = $_POST['psw1'];
		sanitizeString($nick);
		sanitizeString($haslo1);
		sanitizeString($haslo2);
			if ($haslo1!=$haslo2)
			{
				$_SESSION['e_haslo']="Podane hasła nie są identyczne!";
			}
			else{
			
				$user = findUser($nick);
				if($user['name']==$nick)
				{
					$_SESSION['e_nick']="Istnieje już taki użytkownik!";
				}
				else{									
					$haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);
					$user = [
						'name' => $nick,
						'email' => $email,
						'psw' => $haslo_hash
					];
					addUser($user);
					header('Location: login.php');
					exit;
				}
			}
		}
		else {
			if (!empty($_GET['id'])) {
				$id = $_GET['id'];
				$user = $db->users->findOne(['_id' => new ObjectID($id)]);
			}
		}
?>
<!DOCTYPE html>
<html lang="pl">

<head>

	<meta charset="utf-8"/>
	<title>Jaśminowy ogródek</title>
	<meta name="description" content="Strona poświęcona kwiatom i motylom."/>
	<meta name="keywords" content=""/>
	<meta name="author" content="s189477"/>
	
	<meta http-equiv="X-Ua-Compatible" content="IE=edge"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/galery_style.css"/>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet"> 
	<link href="fontAwesome/css/all.css" rel="stylesheet">
	
	<script src="js/script.js" defer></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
			document.addEventListener("DOMContentLoaded", function() {
			  tryb(); navi();
			});
		</script>
	<noscript>
		
			<style>
				.noscript{
					display: block;
					height: 130px;
				}
				#sun{
					display: none;
				}

			</style>
			
		</noscript>
	
</head>

<body>
		
	<div id="container" class="light">	
		<div id="header">
			<header>
			
				<div class="logo">
					<img id="logo_motyl" src="img/motyl.png" alt="Logo strony" class="responsive"/> 
					<br/>Jaśminowy ogródek
				</div>
			<nav>
				<div id="nav">
					<ol>
						<li><a href="index.php"><i class="fas fa-home"></i></a></li>
						<li><a href="galery.php">Galeria</a></li>
						<li><a href="garden.php">Stanowisko</a></li>
						<li><a href="contact.php">Kontakt</a></li>
						<li><a href="login.php" role="button"><i class="fas fa-user"></i></a></li>
						<li><a href="#" role="button" onClick="dark()"><i id="sun" class="fas fa-moon"></i></a></li>
					</ol>
				</div>
			</nav>	
				<div class="noscript">
					<i class="fas fa-exclamation-triangle"></i><p>Strona wymaga do poprawnego działania włączonego JS.	Włącz w przeglądarce JS oraz/albo wyłącz dodatki blokujące JS, a następnie odśwież witrynę.
					<br/> 
					<span>Dziękujemy za zrozumienie i życzymy miłego korzystania z serwisu.</span><br/>
				</div>
				
			</header>
		</div>
	<div id="content">
		<h3>Rejestracja:</h3>
		<form method="post">
		
			<label for="name"> Nazwa:</label><br/>
			<input type="text" id="name" name="name" required /><br/>
			<?php
				if (isset($_SESSION['e_nick']))
				{
					echo '<div class="error">'.$_SESSION['e_nick'].'</div>';
					unset($_SESSION['e_nick']);
				}
			?>
			<label for="mail"> Email:</label><br/>
			<input type="email" id="mail" name="mail" required /><br/>
			<label for="psw"> Hasło:</label><br/>
			<input type="password" id="psw" name="psw" required /><br/>
			<label for="psw1"> Powtórz hasło:</label><br/>
			<input type="password" id="psw1" name="psw1" required /><br/>
			<?php
				if (isset($_SESSION['e_haslo']))
				{
					echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
					unset($_SESSION['e_haslo']);
				}
			?><br/>	
			<input type="submit" value="Register" name="submit">
			
		</form>
		<br/>
		<span>Masz już konto? <a href="login.php" style="text-decoration:none; color:#ff1744;">Zaloguj się</a></span>
		<span>Chcesz wysłać zdjęcie bez logowania? <a href="test.php" style="text-decoration:none; color:#ff1744;">Kliknij</a></span>
	</div>
		<div id="footer">
			<footer>
				Copyright &copy; Kacper Wszeborowski s189477
			</footer>
		</div>

	</div>
</body>

</html>