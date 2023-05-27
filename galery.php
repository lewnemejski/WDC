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
	<link rel="stylesheet" href="css/galery_style.css"/>
	<link rel="preconnect" href="https://fonts.googleapis.com"/>
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet"/> 
	<link href="fontAwesome/css/all.css" rel="stylesheet"/>
	
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
					<br/>Jaśminowy ogródek
				</div>
				
			<nav>	
				<div id="nav">
					
						<ol>
							<li><a href="index.php"><i class="fas fa-home"></i></a></li>
							<li><a href="galery.php">Galeria</a>
								<ul>
									<li><a href="#start">Serwisu</a></li>
									<li><a href="usergalery.php">Użytkowników</a></li>
								</ul>
							</li>
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
		
		<div id="content" style="text-align:center;">
		
			<h1>Galeria zdjęć</h1>
			<img id="start" style="width: 700px;" src="img/galery.jpg" alt="Prezentacyjny obrazek"/> <br/>
			<span style="font-size: 17px;"><i>„Szczęście jest jak motyl: kiedy usiłujesz je złapać, zawsze wymyka ci się z rąk. Ale jeśli cichutko usiądziesz, to może samo do ciebie przyleci.“</i></span> ~Nathaniel Hawthorne
			<section id="1">
				<h2>Motyle</h2>

				<div class="row" style=" width: 100%; display: flex; justify-content: center;">
					<div class="column">
						<img src="img/ornithoptera_alexandrae.jpg" alt="Samiec Ornithoptera alexandrae" style="width:100%" onclick="imgExpander(this);">
					</div>
				
					<div class="column">
						<img src="img/aglais_io.jpg" alt="Aglais io" style="width:100%" onclick="imgExpander(this);">
					</div>
					
					<div class="column">
						<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/24/Iphiclides_podalirius.jpg/1170px-Iphiclides_podalirius.jpg" alt="Iphiclides podalirius" style="width:100%" onclick="imgExpander(this);">
					</div>
					
					<div class="column">
						<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6d/Papilio_machaon_01_%28HS%29.jpg/1197px-Papilio_machaon_01_%28HS%29.jpg" alt="Papilio machaon" style="width:100%" onclick="imgExpander(this);">
					</div>
					
					<div class="column">
						<img src="https://upload.wikimedia.org/wikipedia/commons/7/73/Paranthrene_tabaniformis3.jpg" alt="Paranthrene tabaniformis" style="width:100%" onclick="imgExpander(this);">
					</div>
					
				</div>
			</section>
			
			<section id="2">
				<h2>Kwiaty</h2>

				<div class="row" style=" width: 100%; display: flex; justify-content: center;">
					<div class="column">
						<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/33/Anthemis_vulgaris_Cabezuela_2013-2-03_SierraMadrona.jpg/1200px-Anthemis_vulgaris_Cabezuela_2013-2-03_SierraMadrona.jpg" alt="Matricaria chamomilla L." style="width:100%" onclick="imgExpander(this);">
					</div>
				
					<div class="column">
						<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/97/Heather_%28Highlands%29.jpg/963px-Heather_%28Highlands%29.jpg" alt="Calluna vulgaris (L.)" style="width:100%" onclick="imgExpander(this);">
					</div>
					
					<div class="column">
						<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ee/20200507_bosvergeetmijnietje.jpg/1200px-20200507_bosvergeetmijnietje.jpg" alt="Myosotis sylvatica Hoffm." style="width:100%" onclick="imgExpander(this);">
					</div>
					
					<div class="column">
						<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/98/Keukenhof_2018_DSC_0059.jpg/1200px-Keukenhof_2018_DSC_0059.jpg" alt="Tulipa L." style="width:100%" onclick="imgExpander(this);">
					</div>
					
					<div class="column">
						<img src="https://upload.wikimedia.org/wikipedia/commons/c/cc/Daisies5.jpg" alt="Leucanthemum vulgare Lam." style="width:100%" onclick="imgExpander(this);">
					</div>
					
				</div>
			</section>
			
			<br/>
			
			<section id="3">
				<div class="container">
					<span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
					<img id="expandedImg" src="none" alt="" style="width:100%">
					<div id="imgtext"></div>
				</div>
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