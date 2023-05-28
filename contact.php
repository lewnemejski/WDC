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
	<link rel="stylesheet" href="css/contact_style.css"/>
	<link rel="preconnect" href="https://fonts.googleapis.com"/>
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet"/> 
	<link href="fontAwesome/css/all.css" rel="stylesheet"/>
	<style> 
		#anim {
		  width: 50px;
		  height: 50px;
		  position: relative;
		  animation: gwiazdka linear 4s infinite alternate; 
		}

		@keyframes gwiazdka {
		  from {left: 700px;}
		  to {left: 800px;}
		}
	</style>
	
	<script src="js/script.js" defer></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
	<script>
		$( function() {
		$( "#tabs" ).tabs();
		} );
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
						<li><a href="Pracownik_pr.php">Stanowisko</a></li>
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
			<br/>
			<div id="tabs">
				<ul>
					<li><a href="#fragment-1"><span>Informacje</span></a></li>
					<li><a href="#fragment-2"><span>Formularz kontaktowy</span></a></li>
					<li><a href="#fragment-3"><span>Zgłaszanie problemów</span></a></li>
				</ul>
				
				<div id="fragment-1">
					<section>
						<!--<div id="anim">
							<svg width="50" height="50">
								<polygon points="25,2.5 10,49.5 47.5,19.5 2.5,19.5 40,49.5"
								style="fill:yellow;stroke-width:0;" />
							</svg>
						</div>-->
						<h1>Informacje o stronie i prawach autorskich</h1>
						<h2>Galeria</h2>
						<div id="table">
							<table>
								<tr>
									<th>Motylki</th>
									<th>Kwiaty</th>
								</tr>
								<tr>
									<td>https://commons.wikimedia.org/wiki/Category:Ornithoptera_alexandrae#/media/File:BigInsect4BedfordMuseum.JPG</td>
									<td>https://commons.wikimedia.org/wiki/File:Anthemis_vulgaris_Cabezuela_2013-2-03_SierraMadrona.jpg</td>
								</tr>
								<tr>
									<td>https://commons.wikimedia.org/wiki/Aglais_io#/media/File:Peacock_butterfly_(Aglais_io)_2.jpg</td>
									<td>https://commons.wikimedia.org/wiki/File:Heather_(Highlands).jpg</td>
								</tr>
								<tr>
									<td>https://commons.wikimedia.org/wiki/Iphiclides_podalirius#/media/File:Iphiclides_podalirius.jpg</td>
									<td>https://commons.wikimedia.org/wiki/File:20200507_bosvergeetmijnietje.jpg</td>
								</tr>
								<tr>
									<td>https://commons.wikimedia.org/wiki/Papilio_machaon#/media/File:Papilio_machaon_01_(HS).jpg</td>
									<td>https://commons.wikimedia.org/wiki/File:Keukenhof_2018_DSC_0059.jpg</td>
								</tr>
								<tr>
									<td>https://commons.wikimedia.org/wiki/File:Paranthrene_tabaniformis3.jpg</td>
									<td>https://commons.wikimedia.org/wiki/Category:Leucanthemum_vulgare#/media/File:Daisies5.jpg</td>
								</tr>
							</table>
						</div>
						<br/>
						<h2>Inne grafiki</h2>
						<span class="strong">Autor loga: Binary Bark,</span> <a href="http://getdrawings.com/butterfly-vector#butterfly-vector-25.png" target="blank">http://getdrawings.com/butterfly-vector#butterfly-vector-25.png</a>
						<br/>
						<span class="strong">Autor zdjęcia na początku galerii: bob fox, </span> <a href="https://www.flickr.com/photos/78746098@N03/17242209485/in/photolist-sgCQaT-4ZkCdi-6w3yjm-am2uhn-bWATQS-8rcfeU-8MJsvq-gHBcX-7hnaTW-aaMssx-9Wh5MC-9u2pdp-cu8Le7-9u5pDA-9u2pt8-a24rEo-eXrB3y-fuphQi-fwtktS-EBUs6u-rmeLgi-9u65zh-shU4pc-9u2oYi-9qC2ie-8StVZV-cUEkum-56r6mX-a4ASWg-os3L4c-9CGJqo-7xqQXy-fCkrrG-7qrGrK-6M6Sub-c3HsyG-2rayu-8rCPxt-BJVKSH-2YDjrD-8nXtEE-7dhCGT-9Cq18f-8SWYMg-6VepSa-6F5Qdp-dcf1N6-2TxHEd-6BDsfF-7n6qXB">http://flickr/...</a>
						<br/>
						<span class="strong">Animacja motyla, z gry pod linkiem <a href="garden.html" target="blank">Gra</a>, </span>  <a href="https://fleetfarming.org/monarch-mission/butterfly/" target="blank">https://fleetfarming.org/monarch-mission/butterfly/</a>
					</section>
				</div>
				
				<div id="fragment-2">
					
					<form class="form" action="order.php" method="post">
						
						<label for="name"> Imię:</label><br>
						<input type="text" id="name" name="name" required /><br>
						
						<label for="surname"> Nazwisko:</label><br>
						<input type="text" id="surname" name="surname" required /><br><br>
						
						<span>Płeć:</span> <br/>
						<input type="radio" id="men" name="sex" value="Mężczyzna" checked />
						<label for="men"> Mężczyzna</label><br>
						
						<input type="radio" id="female" name="sex" value="Kobieta" />
						<label for="female"> Kobieta</label><br/><br/>
						
						<label for="mail"> Adres e-mail:</label>
						<input type="email" id="mail" name="adres" required /><br/><br/>
						
						<label for="tel"> Numer telefonu:</label>
						<input type="tel" id="tel" name="telefon"/><br/>Pole opcjonalne<br/><br/>
						<label> Twój ulubiony kolor <input type="color" name="kolor" value="#000000"></label><br/>
						<label for="issue"> Powód kontaktu </label>
						<select id="issue" name="issue">
					
						<option value="z">Zamówienie</option>
						<option value="r" selected>Reklama</option>
						<option value="s">Sugestie</option>
						<option value="i">Inne</option>
					
					</select>
						
						<div><label for="commentary"> Informacje dodatkowe </label></div>
						<textarea name="commentary" id="commentary" rows="3" cols="60" maxlength="25" minlength="0"></textarea><br/><br/>
						
						<input type="submit" value="Wyślij" />
						<input type="reset" value="Wyczyść formularz" />
						
					</form>
					
				</div>
				
				<div id="fragment-3">
				
					<form class="form" action="order.php" method="post">
						
						<label for="name"> Imię:</label><br>
						<input type="text" id="imie" name="name" required /><br>
						
						<label for="surname"> Nazwisko:</label><br>
						<input type="text" id="nazwisko" name="surname" required /><br><br>
						
						<label for="email"> Adres e-mail:</label>
						<input type="email" id="email" name="adres" required /><br/><br/>
						
						<label for="issues">Jaki masz problem?</label><br/>
						<select id="issues" name="issues">
							<option selected="selected">Strona nie ładuje się</option>
							<option>Ogródek nie działa</option>
							<option>Galeria nie wyświetla się</option>
							<option>Strona nie ładuje się poprawnie na urządzeniu mobilnym</option>
							<option>Inny (Opisz go poniżej)</option>
						</select><br/>
						
						<div><label for="commentary"> Informacje dodatkowe </label></div>
						<textarea name="commentary" id="informations" rows="3" cols="60" maxlength="25" minlength="0"></textarea><br/><br/>
						
						<input type="submit" value="Wyślij" />
						<input type="reset" value="Wyczyść formularz" />
						
					</form>
					
				</div>
				
			</div>
			
		</div>
		
		<div id="footer">
			<footer>
				Copyright &copy; Kacper Wszeborowski Beniamin Samujło
			</footer>
		</div>
		
		<script>
			document.addEventListener("DOMContentLoaded", function() {
			  tryb(); navi();
			});
		</script>
	
	</div>
</body>

</html>