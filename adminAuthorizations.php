<!DOCTYPE html>
<html lang="pl">

<head>

	<meta charset="utf-8"/>
	<title>Jaœminowy ogródek</title>
	<meta name="description" content="Strona poœwiêcona kwiatom i motylom."/>
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
					<br/>Jaœminowy ogródek
				</div>
			<nav>
				<div id="nav">
					<ol>
						<li><a href="index.php"><i class="fas fa-home"></i></a></li>
						<li><a href="galery.php">Galeria</a></li>
						<li><a href="garden.php">Ogródek</a></li>
						<li><a href="contact.php">Kontakt</a></li>
						<li><a href="login.php" role="button"><i class="fas fa-user"></i></a></li>
						<li><a href="#" role="button" onClick="dark()"><i id="sun" class="fas fa-moon"></i></a></li>
					</ol>
				</div>
			</nav>	
				<div class="noscript">
					<i class="fas fa-exclamation-triangle"></i><p>Strona wymaga do poprawnego dzia³ania w³¹czonego JS.	W³¹cz w przegl¹darce JS oraz/albo wy³¹cz dodatki blokuj¹ce JS, a nastêpnie odœwie¿ witrynê.
					<br/> 
					<span>Dziêkujemy za zrozumienie i ¿yczymy mi³ego korzystania z serwisu.</span><br/>
				</div>
				
			</header>
		</div>
		
		<div id="content" style="text-align:justify;">
			<section>

			  <table>
				  <tr>
					  <th> Users </th>
					  <th> Authorization lvl </th>
				  </tr>
				  <tr>
					  <td> User1 </td>
					  <td> lvl 1 </td>
				  </tr>
				  <tr>
					  <td> User2 </td>
					  <td> lvl 2 </td>
				  </tr>
				  <tr>
					  <td> User... </td>
					  <td> lvl ... </td>
				  </tr>
			  </table>

			  <table>
				  <tr>
					  <th> Objects </th>
					  <th> Authorization lvl </th>
				  </tr>
				  <tr>
					  <td> Obj1 </td>
					  <td> lvl 1 </td>
				  </tr>
				  <tr>
					  <td> Obj2 </td>
					  <td> lvl 2 </td>
				  </tr>
				  <tr>
					  <td> Obj... </td>
					  <td> lvl ... </td>
				  </tr>
			  </table>

			</section>
			
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