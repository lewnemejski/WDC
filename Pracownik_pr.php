<?php
session_start();

require_once 'business.php';

$files=getTable("documents");

if ($_SESSION['employee'] != true)
    header("Location: index.php");

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mathjs/10.6.4/math.js"
        integrity="sha512-BbVEDjbqdN3Eow8+empLMrJlxXRj5nEitiCAK5A1pUr66+jLVejo3PmjIaucRnjlB0P9R3rBUs3g5jXc8ti+fQ=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mathjs/10.6.4/math.min.js"
        integrity="sha512-iphNRh6dPbeuPGIrQbCdbBF/qcqadKWLa35YPVfMZMHBSI6PLJh1om2xCTWhpVpmUyb4IvVS9iYnnYMkleVXLA=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"></script>

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

                <button type="button" class="collapsible">Zadania</button>
                <section class="content">
                    <?php foreach ($files as $file): ?>
                        <?php if( $file['who']=="prezes" ): ?>
                            <a href="<?php echo $file['source'];?>" target="_blank"> <?php echo $file['name']; ?> - Pobierz Zadanie</a>
                        <?php endif ?>
                    <?php endforeach ?>
                </section>


                <button type="button" class="collapsible">Rozwiazania</button>
                <section class="content">
                    <form action="uploadDoc.php" method="post" enctype="multipart/form-data">
                        <fieldset>
                            <legend> Wyslij rozwiazanie </legend>
                            <input type="file" name="fileToUpload" id="answer" accept=".zip, .rar, .pdf" required />
                            <input type="text" name="comment" id="comment" />
                            <input type="submit" value="Upload file" name="submit" />
                        </fieldset>
                    </form>
                </section>

                <button type="button" class="collapsible">Rozwiazania</button>
                <section class="content">
                    <table id="calcu">
                        <tr>
                            <td colspan="3">
                                <input type="text" id="result" />
                            </td>
                            <!-- clr() function will call clr to clear all value -->
                            <td>
                                <input type="button" value="c" onclick="clr()" />
                            </td>
                        </tr>
                        <tr>
                            <!-- create button and assign value to each button -->
                            <!-- dis("1") will call function dis to display value -->
                            <td>
                                <input type="button" value="1" onclick="dis('1')"
                                    onkeydown="myFunction(event)" />
                            </td>
                            <td>
                                <input type="button" value="2" onclick="dis('2')"
                                    onkeydown="myFunction(event)" />
                            </td>
                            <td>
                                <input type="button" value="3" onclick="dis('3')"
                                    onkeydown="myFunction(event)" />
                            </td>
                            <td>
                                <input type="button" value="/" onclick="dis('/')"
                                    onkeydown="myFunction(event)" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="button" value="4" onclick="dis('4')"
                                    onkeydown="myFunction(event)" />
                            </td>
                            <td>
                                <input type="button" value="5" onclick="dis('5')"
                                    onkeydown="myFunction(event)" />
                            </td>
                            <td>
                                <input type="button" value="6" onclick="dis('6')"
                                    onkeydown="myFunction(event)" />
                            </td>
                            <td>
                                <input type="button" value="*" onclick="dis('*')"
                                    onkeydown="myFunction(event)" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="button" value="7" onclick="dis('7')"
                                    onkeydown="myFunction(event)" />
                            </td>
                            <td>
                                <input type="button" value="8" onclick="dis('8')"
                                    onkeydown="myFunction(event)" />
                            </td>
                            <td>
                                <input type="button" value="9" onclick="dis('9')"
                                    onkeydown="myFunction(event)" />
                            </td>
                            <td>
                                <input type="button" value="-" onclick="dis('-')"
                                    onkeydown="myFunction(event)" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="button" value="0" onclick="dis('0')"
                                    onkeydown="myFunction(event)" />
                            </td>
                            <td>
                                <input type="button" value="." onclick="dis('.')"
                                    onkeydown="myFunction(event)" />
                            </td>
                            <!-- solve function call function solve to evaluate value -->
                            <td>
                                <input type="button" value="=" onclick="solve()" />
                            </td>

                            <td>
                                <input type="button" value="+" onclick="dis('+')"
                                    onkeydown="myFunction(event)" />
                            </td>
                        </tr>
                    </table>
                </section>
</div>
        <?php endif; ?>

        <?php if ($_SESSION['employeeName'] == "prezes"): ?>
            <div id="content" style="text-align:justify;">

                <button type="button" class="collapsible">Zlecenie</button>
                <section class="content">
                    <form action="uploadDoc.php" method="post" enctype="multipart/form-data">
                        <fieldset>
                            <legend> Wyslij zlecenie </legend>
                            <input type="file" name="fileToUpload" id="question" accept=".zip, .rar, .pdf" required />
                            <input type="submit" value="Upload file" name="submit" />
                        </fieldset>
                    </form>
                </section>

                <button type="button" class="collapsible">Rozwiazania</button>
                <section class="content">
                    <?php foreach ($files as $file): ?>
                        <?php if( $file['who']=="noob" ): ?>
                            <a href="<?php echo $file['source'];?>" target="_blank"><?php echo $file['name']; ?> - Pobierz Rozwiazanie</a>
                        <?php endif ?>
                    <?php endforeach ?>
                </section>

            </div>
        <?php endif; ?>

        <script>
            var coll = document.getElementsByClassName("collapsible");
            var i;

            for (i = 0; i < coll.length; i++) {
                coll[i].addEventListener("click", function () {
                    this.classList.toggle("active");
                    var content = this.nextElementSibling;
                    if (content.style.maxHeight) {
                        content.style.maxHeight = null;
                    } else {
                        content.style.maxHeight = content.scrollHeight + "px";
                    }
                });
            }

            function dis(val) {
                document.getElementById("result").value += val
            }

            function myFunction(event) {
                if (event.key == '0' || event.key == '1'
                    || event.key == '2' || event.key == '3'
                    || event.key == '4' || event.key == '5'
                    || event.key == '6' || event.key == '7'
                    || event.key == '8' || event.key == '9'
                    || event.key == '+' || event.key == '-'
                    || event.key == '*' || event.key == '/')
                    document.getElementById("result").value += event.key;
            }

            var cal = document.getElementById("calcu");
            cal.onkeyup = function (event) {
                if (event.keyCode === 13) {
                    console.log("Enter");
                    let x = document.getElementById("result").value
                    console.log(x);
                    solve();
                }
            }

            function solve() {
                let x = document.getElementById("result").value
                let y = math.evaluate(x)
                document.getElementById("result").value = y
            }

            function clr() {
                document.getElementById("result").value = ""
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