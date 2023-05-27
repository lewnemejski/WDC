<?php
session_start();
if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany'] == true)) {
    header('Location: test.php');
    exit();
}
require_once "functions.php";
require_once "business.php";

if (isset($_POST['name'])) {
    $nick = $_POST['name'];
    $psw = $_POST['psw'];
    //sanitizeString($nick);
    //sanitizeString($psw);
    $user = findUser($nick);
	if(isset($user['name']) && $user['employee']==true){
		$test=substr($user['name'],0,2);
		if (isset($user['name']) && $user['name'] == $_POST['name'] && $_POST['employee_id']==$test) {
			if (password_verify($psw, password_hash($user['password'], PASSWORD_DEFAULT))) {
				$_SESSION['zalogowany'] = true;
				$_SESSION['user'] = $user['name'];
				$_SESSION['authorization'] = $user['role'];
				$_SESSION['employee'] = $user['employee'];
				$roles=getTable("role_rbac");
				foreach($roles as $role){
					if($user['id']==$role['user_id']){
						$_SESSION['employeeName']=$role['object_name'];
						break;
					}
				}
				unset($_SESSION['blad']);
				header('Location: test.php');
			} else {
				$_SESSION['blad'] = '<span style="color:red">Nieprawid�owe has�o!</span>';
				//header('Location: login.php');
			}
		} else {
			$_SESSION['blad'] = '<span style="color:red">Nieprawidlowa nazwa lub id!</span>';
			//header('Location: login.php');
		}
	}
	else if(isset($user['name']) && $user['employee']==false){
		$_SESSION['blad'] = '<span style="color:red">Nie jestes pracownikiem! <a href="login.php">Logowanie dla uzytkownikow</a></span>';
	}
	else{
		$_SESSION['blad'] = '<span style="color:red">Nieprawidlowe dane logowania!</span>';
	}
} else
    unset($_SESSION['blad']);

?>
<!DOCTYPE html>
<html lang="pl">

<head>

    <meta charset="utf-8" />
    <title>Jaśminowy ogródek</title>
    <meta name="description" content="Strona poswiecona kwiatom i motylom." />
    <meta name="keywords" content="" />
    <meta name="author" content="s189477" />

    <meta http-equiv="X-Ua-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/galery_style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet" />
    <link href="fontAwesome/css/all.css" rel="stylesheet" />

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
                    <img id="logo_motyl" src="img/motyl.png" alt="Logo strony" class="responsive" />
                    <br />Jasminowy ogrodek
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
                                <a href="garden.php">Ogrodek</a>
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
        <div id="content">
            <h3>Logowanie:</h3>
            <form method="post">

                <label for="employee_id"> Id Pracownika:</label><br />
                <input type="text" id="employee_id" name="employee_id" required /><br /><br />
                <label for="name"> Nazwa:</label><br />
                <input type="text" id="name" name="name" required /><br />
                <label for="psw"> Haslo:</label><br />
                <input type="password" id="psw" name="psw" required /><br /><br />

                <?php
					if (isset($_SESSION['blad']))
					{
						echo '<div class="error">'.$_SESSION['blad'].'</div>';
					}
                ?>
                <input type="submit" value="Login" name="submit" />

            </form>
            <br />
            <span>
                Nie masz jeszcze konta? <a href="register.php" style="text-decoration:none; color:#ff1744;">Zarejestruj sie</a>
            </span>
            <span>
                Chcesz wyslac zdjecie jako gosc? <a href="test.php" style="text-decoration:none; color:#ff1744;">Kliknij</a>
            </span>


        </div>
        <div id="footer">
            <footer>
                Copyright &copy; Kacper Wszeborowski s189477
            </footer>
        </div>

    </div>
</body>
</html>