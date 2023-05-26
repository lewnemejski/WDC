<?php

function db_Login(){
	require_once "connect.php";
    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

    if($polaczenie->connect_errno!=0){
        echo "Error: ".polaczenie->connect_errno;
    }
    else{
        //echo "Worked!";

        $sql = "SELECT * FROM users";
        if($rezultat = @$polaczenie->query($sql)){
            $polaczenie->close();
            return $users = $rezultat->fetch_all(MYSQLI_ASSOC);
        }

        /*
        if($rezultat = @$polaczenie->query($sql)){

            $wiersz=$rezultat->fetch_assoc();

            echo $wiersz['id']." ".$wiersz['name']." ";

            //$rezultat->free_result();

            $wiersz=$rezultat->fetch_assoc();

            echo $wiersz['id']." ".$wiersz['name']." ";

            $rezultat->free_result();
        }*/

        $polaczenie->close();
    }
}

function getTable($tableName){
	require_once "connect.php";
	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

    if($polaczenie->connect_errno!=0){
        echo "Error: ".polaczenie->connect_errno;
    }
    else{
        //echo "Worked!";

        $sql = "SELECT * FROM ".$tableName;
        if($rezultat = @$polaczenie->query($sql)){
            $polaczenie->close();
            return $rezultat->fetch_all(MYSQLI_ASSOC);
        }
		$polaczenie->close();
	}
}

function findUser($nick){
	require_once "connect.php";
	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

    if($polaczenie->connect_errno!=0){
        echo "Error: ".polaczenie->connect_errno;
    }
    else{
        echo "Worked!";

        $sql = "SELECT * FROM users where name='".$nick."'";
        if($rezultat = @$polaczenie->query($sql)){
            $polaczenie->close();
			$user = $rezultat->fetch_assoc();
			$rezultat->free_result();
			return $user;
        }
		$polaczenie->close();
	}
}

function changePermission($name, $permission_lvl) {
    $sql = "UPDATE users SET role='" . $permission_lvl . "' WHERE name='" . $name . "'";
}
?>