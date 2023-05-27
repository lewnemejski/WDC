<?php
session_start();

require_once 'business.php';

if ($_SESSION['employee'] != true)
    header("Location: index.php");

if (isset($_POST["submit"])) {
    if (isset($_FILES["answer"])) {
        $file = $_FILES["answer"];

    } else if (isset($_FILES["question"])) {
        $file = $_FILES["question"];

    } else {
        header("Location: Pracownik_pr.php");
    }
}

?>

<!DOCTYPE html>
<html lang="pl">

<head>

    <meta charset="utf-8" />
    <title>Ja�minowy ogr�dek</title>
    <meta name="description" content="Strona po�wi�cona kwiatom i motylom." />
    <meta name="keywords" content="" />
    <meta name="author" content="s189477" />

    <meta http-equiv="X-Ua-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet" />
    <link href="fontAwesome/css/all.css" rel="stylesheet" />

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
	<style>
				.collapsible {
  background-color: #777;
  color: white;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
}

.active, .collapsible:hover {
  background-color: #555;
}

.content {
  padding: 0 18px;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
  background-color: #f1f1f1;
}
		</style>



</head>

<body>

    <div id="container" class="light">
        <div id="header">
            <header>

                <div class="logo">
                    <img id="logo_motyl" src="img/motyl.png" alt="Logo strony" class="responsive" />
                    <br />Ja�minowy ogr�dek
                </div>
                <nav>
                    <div id="nav">
                        <ol>
                            <li>
                                <a href="index.php">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li>
                                <a href="galery.php">Galeria</a>
                            </li>
                            <li>
                                <a href="Pracownik_pr.php">Stanowisko</a>
                            </li>
                            <li>
                                <a href="contact.php">Kontakt</a>
                            </li>
                            <li>
                                <a href="login_choice.php" role="button">
                                    <i class="fas fa-user"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" role="button" onclick="dark()">
                                    <i id="sun" class="fas fa-moon"></i>
                                </a>
                            </li>
                        </ol>
                    </div>
                </nav>
                <div class="noscript">
                    <i class="fas fa-exclamation-triangle"></i><p>
                        Strona wymaga do poprawnego dzia�ania w��czonego JS.	W��cz w przegl�darce JS oraz/albo wy��cz dodatki blokuj�ce JS, a nast�pnie od�wie� witryn�.
                        <br />
                        <span>Dzi�kujemy za zrozumienie i �yczymy mi�ego korzystania z serwisu.</span><br />
                </div>

            </header>
        </div>

        <?php if($_SESSION['employeeName'] == "noob"): ?>
            <div id="content" style="text-align:justify;">

                <button type="button" class="collapsible">Rozwiazania</button>
                <section class="content">
                    <form method="post" enctype="multipart/form-data">
                        <fieldset>
                            <legend> Wyslij rozwiazanie </legend>
                            <input type="file" name="answer" id="fileToUpload" accept=".zip, .rar, .pdf" required />
                            <input type="text" name="comment" id="comment" />
                            <input type="submit" value="Upload file" name="submit" />
                        </fieldset>
                    </form>
                </section>
				
            </div>
        <?php endif; ?>

        <?php if ($_SESSION['employeeName'] == "prezes"): ?>
            <div id="content" style="text-align:justify;">

                <button type="button" class="collapsible">Zlecenie</button>
                <section class="content">
                    <form method="post" enctype="multipart/form-data">
                        <fieldset>
                            <legend> Wyslij zlecenie </legend>
                            <input type="file" name="question" id="fileToUpload" accept=".zip, .rar, .pdf" required />
                            <input type="submit" value="Upload file" name="submit" />
                        </fieldset>
                    </form>
                </section>

                <button type="button" class="collapsible">Rozwiazania</button>
                <section class="content">
                    <?php foreach (/* pliki przeslane */): ?>
                        <?php if( /* plik pracownika */ ): ?>
                            <a href=""></a>
                        <?php endif ?>
                    <?php endforeach ?>
                </section>



            </div>
        <?php endif; ?>

<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}
</script>
		
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