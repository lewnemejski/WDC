<?php

function isLogged()
{
	if((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
		return true;
	else
		return false;
}
function sanitizeString($string)
{
	$string = htmlentities($string, ENT_QUOTES, "UTF-8");
	return $string;
}
?>
