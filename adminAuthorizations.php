<?php

session_start();
require_once "business.php";

$users = getTable("users");
$objects = getTable("objects");

if(isset($_SESSION['user'])==false)
	$_SESSION['authorization']=1;

if (isset($_POST['name'])) {
	
	$_SESSION['user_name'] = $_POST['name'];
	
	header('Location: users_permissions.php');
	exit;
}
?>


<!DOCTYPE html>
<html lang="pl">

<head>

	<meta charset="utf-8"/>
	<title>Ja�minowy ogr�dek</title>
	<meta name="description" content="Strona po�wi�cona kwiatom i motylom."/>
	<meta name="keywords" content=""/>
	<meta name="author" content="s189477, s191687"/>

	<meta http-equiv="X-Ua-Compatible" content="IE=edge"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="css/style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet"> 
	<link href="fontAwesome/css/all.css" rel="stylesheet">
	
	<script src="js/script.js" defer></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	
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
					<br/>Ja�minowy ogr�dek
				</div>
			<nav>
				<div id="nav">
					<ol>
						<li><a href="index.php"><i class="fas fa-home"></i></a></li>
						<li><a href="galery.php">Galeria</a></li>
						<li><a href="garden.php">Ogr�dek</a></li>
						<li><a href="contact.php">Kontakt</a></li>
						<li><a href="login.php" role="button"><i class="fas fa-user"></i></a></li>
						<li><a href="#" role="button" onClick="dark()"><i id="sun" class="fas fa-moon"></i></a></li>
					</ol>
				</div>
			</nav>	
				<div class="noscript">
					<i class="fas fa-exclamation-triangle"></i><p>Strona wymaga do poprawnego dzia�ania w��czonego JS.	W��cz w przegl�darce JS oraz/albo wy��cz dodatki blokuj�ce JS, a nast�pnie od�wie� witryn�.
					<br/> 
					<span>Dzi�kujemy za zrozumienie i �yczymy mi�ego korzystania z serwisu.</span><br/>
				</div>
				
			</header>
		</div>
		<h2 style="text-align: center">Twój poziom autoryzacji: <?php echo $_SESSION['authorization']; ?></h2>
		<div id="authorization" style="text-align:justify;">

            <?php if(count($users) >= 1): ?>
				<section>

				  <?php if( $_SESSION['authorization'] > 2 ):?>
					  <table>
						<tr>
							<th> Users </th>
							<th> Authorization lvl </th>
							<th> Change lvl </th>
						</tr>
						<?php foreach($users as $user): ?>
						  <?php if($user['role'] < $_SESSION['authorization']): ?>
							<tr>
								<td> <?php echo $user['name']; ?>	</td>
								<td> <?php echo $user['role']; ?>  </td>
								<td> 
                                    <form method="post">
                                        <input id="name" type="text" value="<?php echo $user['name']; ?>" hidden name="name"/>
                                        <input type="submit" value="Edytuj" name="submit" width="100%"/>
                                    </form>
								</td>
							</tr>
						  <?php endif; ?>
						<?php endforeach ?>

					  </table>
				  <?php endif ?>

					<table>
						<tr>
							<th> Objects </th>
							<th> Authorization lvl </th>
							<th> Granted </th>
						</tr>
						<?php if($objects): ?>
							<?php foreach($objects as $object): ?>
							<tr>
								<td> <?php echo $object['name']; ?> </td>
								<td> <?php echo $object['role_required']; ?> </td>
                                <?php if($object['role_required'] <= $_SESSION['authorization']): ?>
									<td> Yes </td>
								<?php else: ?>
									<td> No </td>
								<?php endif ?>
							</tr>
							<?php endforeach ?>
						<?php endif ?>

					</table>

				</section>
			<?php else: ?> 
				<p>No users exist at the moment</p>
			<?php endif ?>

		</div>
		<div id="footer">
			<footer>
				Copyright &copy; Kacper Wszeborowski s189477
			</footer>
		</div>

	</div>
	
	<script>
		document.addEventListener("DOMContentLoaded", function() {
		  tryb(); navi();
		});
	</script>
	
</body>

</html>