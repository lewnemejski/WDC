<?php

session_start();
require_once "business.php";

if(!(isset($_SESSION['employee']) && $_SESSION['employee'] == true))
{
	header('Location: index.php');
	exit();
}

if((isset($_SESSION['user_name']))==false)
{
	header('Location: adminAuthorizations.php');
	exit();
}

$users = getTable("users");
$objects = getTable("objects");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
   if(isset($_POST["submit"])){
        $selectedPermission = 0;
		
        if (isset($_POST["add"])) 
            $selectedPermission += $_POST["add"];
        if (isset($_POST["del"])) 
            $selectedPermission += $_POST["del"];
        if (isset($_POST["del_yours"])) 
            $selectedPermission += $_POST["del_yours"];
        
        changePermission($_SESSION['user_name'], $selectedPermission);
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
    <meta name="author" content="s189477, s191687" />

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

        <div id="authorization" style="text-align:justify;">
            <section>

                <form method="post">
                    <fieldset>
                        <legend>Zmiana uprawnien</legend>

                        <label for="permission1">Dodawanie zdjec</label>
                        <input type="checkbox" id="permission1" value="1" name="add" />

                        <label for="permission2">Usuwanie zdjec</label>
                        <input type="checkbox" id="permission2" value="3" name="del" />

                        <label for="permission3">Usuwanie swoich zdjec</label>
                        <input type="checkbox" id="permission3" value="5" name="del_yours" />

                        <input type="submit" value="Submit" name="submit"/>

                    </fieldset>
                </form>
            </section>
        </div>
		<h3 style="text-align:center"><a href="relocate.php">Powrót</a></h3>
        <div id="footer">
            <footer>
                Copyright &copy; Kacper Wszeborowski Beniamin Samujło
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