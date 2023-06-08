<!DOCTYPE html>
<html lang="pl">

<head>

	<meta charset="utf-8"/>
	<title>Jaśminowy ogródek</title>
	<meta name="description" content="Strona poświęcona kwiatom i motylom."/>
	<meta name="keywords" content=""/>
	<meta name="author" content="s189477"/>
	
	<meta http-equiv="X-Ua-Compatible" content="IE=edge"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	
	<link rel="stylesheet" href="css/style.css"/>
	<link rel="stylesheet" href="css/garden_style.css"/>
	<link rel="preconnect" href="https://fonts.googleapis.com"/>
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet"/> 
	<link href="fontAwesome/css/all.css" rel="stylesheet"/>
	
	<script src="js/script.js" defer></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
	<script>
		$( function()
			{
				$( "#zegarek" ).on( "click", function() 
				{
					$( ".visible" ).switchClass( "visible", "hidden", 10 );
					$( ".hidden_gra" ).switchClass( "hidden_gra", "visible_gra", 10 );
					$( ".motyl_h" ).switchClass( "motyl_h", "motyl_v", 10 );
					$( ".niebo_h" ).switchClass( "niebo_h", "niebo_v", 10);
				});
				$( "#resetTimer" ).on( "click", function() 
				{
					$( ".hidden" ).switchClass( "hidden", "visible", 10 );
					$( ".visible_gra" ).switchClass( "visible_gra", "hidden_gra", 10 );
					$( ".motyl_v" ).switchClass( "motyl_v", "motyl_h", 10 );
					$( ".niebo_v" ).switchClass( "motyl_v", "niebo_h", 10 );
					document.getElementById("wynik_motyle").innerHTML = '<span id="childSpan"></span>';
					document.getElementById("timer").innerHTML = "";
				});
				$( "#Motyl" ).on( "click", function() 
				{
					$( ".motyl_v" ).switchClass( "motyl_v", "motyl_h", 10 );
				});
				$( "#Niebo" ).on( "click", function() 
				{
					$( ".niebo_v" ).switchClass( "motyl_v", "niebo_h", 10 );
				});
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
		
				<div id="menu">
				
					<h1>Witamy w ogródku</h1>
					<p>Można tutaj zagrać w grę polega na zebraniu jak największej kolekcji różnych motyli.</p>
					<span style="font-style: italic;">Z przyczyn technicznych zaleca się korzystanie z gry na urządzeniu innym niż telefon.</span>
					<h2>Zasady:</h2>
					<ol>
						<li>Czas każdej rozgrywki wynosi: 5 minut.</li>
						<li>Ilość różnych motyli do zdobycia, na chwilę obecną, to 5.</li>
						<li>Gra jest losowa.</li>
						<li>Wynik gracza jest przechowywany na czas sesji(Do zamknięcia okna przeglądarki).</li>
					</ol>
					
				</div>
					
		</div>
		
		<div id="game">
					
			<button id="zegarek" class="visible center" onClick="timerStart()">Rozpocznij grę</button>
			<button id="resetTimer" class="center1" onClick="">Zresetuj grę</button>
			<br/>
						
			<div id="timer" class="centerTime"></div>
						
			<p><button id="Motyl" class="hidden_gra motyl_h" onclick="lot()">Motyl - lot</button></p>
			<p><button id="Niebo" class="hidden_gra niebo_h" onclick="sky()">Animacja nieba (ON)</button></p>
			
			<div id="sky" class="hidden_gra"><img id="cloud" src="img/chmura.png" alt="Chmurka"/></div>
			<div id="sPlan" class="hidden_gra"></div>	
						
			<div id ="fPlan" class="hidden_gra">
				<img id="animate" src="img/test.png" alt="Motylek"/>
			</div>
			<p><button onclick="resetujWynik()">Reset wyniku</button></p>
		</div>
			
		<div id="wynik_a">
			<br/><span>Twoje motyle:</span><br/><div id="wynik_motyle"><span id="childSpan"></span></div>
		</div>
		
		<div id="wynik">
			Łączna liczba zebranych motyli w sesji: 
			<div id="result">0</div>
		</div>
		
		<div id="footer">
			<footer>
				Copyright &copy; Kacper Wszeborowski Beniamin Samujło
			</footer>
		</div>
		
		<script>
			document.addEventListener("DOMContentLoaded", function() {
			  tryb(); navi(); wypiszWynik();
			});
		</script>
	
	</div>
</body>

</html>