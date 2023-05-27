<?php

function db_Login(){
	require "connect.php";
    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

    if($polaczenie->connect_errno!=0){
        echo "Error: ".$polaczenie->connect_errno;
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

        else $polaczenie->close();
    }
}

function getTable($tableName){
	require "connect.php";
	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

    if($polaczenie->connect_errno!=0){
        echo "Error: ".$polaczenie->connect_errno;
    }
    else{
        //echo "Worked!";

        $sql = "SELECT * FROM ".$tableName;
        if($rezultat = @$polaczenie->query($sql)){
            $polaczenie->close();
            return $rezultat->fetch_all(MYSQLI_ASSOC);
        }
		else $polaczenie->close();
	}
}

function findUser($nick){
	require "connect.php";
	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

    if($polaczenie->connect_errno!=0){
        echo "Error: ".$polaczenie->connect_errno;
    }
    else{
        //echo "Worked!";

        $sql = "SELECT * FROM users where name='".$nick."'";
        if($rezultat = @$polaczenie->query($sql)){
            $polaczenie->close();
			$user = $rezultat->fetch_assoc();
			$rezultat->free_result();
			return $user;
        }
		else $polaczenie->close();
	}
}

function changePermission($name, $permission_lvl) {
	require "connect.php";
	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	if($polaczenie->connect_errno!=0){
        echo "Error: ".$polaczenie->connect_errno;
    }
    else{
		$sql = "UPDATE users SET role='" . $permission_lvl . "' WHERE name='" . $name . "'";
		if($rezultat = @$polaczenie->query($sql)){
            $polaczenie->close();
        }
		else $polaczenie->close();
	}
}

function addImage($image){
	require "connect.php";
	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	if($polaczenie->connect_errno!=0){
        echo "Error: ".$polaczenie->connect_errno;
    }
    else{
		$values="NULL, '".$image['author']."', '".$image['title']."', '".$image['source']."', '".$image['private']."', '".$image['auth']."')";
		$sql = "INSERT INTO images (id, author, title, source, private, auth) VALUES (".$values;
		if($rezultat = @$polaczenie->query($sql)){
            $polaczenie->close();
        }
		else $polaczenie->close();
	}
}

function deleteImage($image, $path){
	require "connect.php";
	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	if($polaczenie->connect_errno!=0){
        echo "Error: ".$polaczenie->connect_errno;
    }
    else{
		$sql = "DELETE FROM images WHERE id='".$image."'";
		$filePath="uploads/".$path;
		if (file_exists($filePath)) {
			if (unlink($filePath)) {
				//echo "File deleted successfully.";
			} else {
				//echo "Unable to delete the file.";
			}
		} else {
			//echo "File does not exist.";
		}
		if($rezultat = @$polaczenie->query($sql)){
            $polaczenie->close();
        }
		else $polaczenie->close();
	}
	
}

function addDoc($document){
	require "connect.php";
	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	if($polaczenie->connect_errno!=0){
        echo "Error: ".$polaczenie->connect_errno;
    }
    else{
		$values="NULL, '".$document['name']."', '".$document['source']."', '".$document['who']."')";
		$sql = "INSERT INTO documents (id, name, source, who) VALUES (".$values;
		if($rezultat = @$polaczenie->query($sql)){
            $polaczenie->close();
        }
		else $polaczenie->close();
	}
}
?>