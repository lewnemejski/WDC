<?php

function db_Login(){

    $host="localhost";
    $db_user="root";
    $db_password="";
    $db_name="test";

    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

    if($polaczenie->connect_errno!=0){
        echo "Error: ".polaczenie->connect_errno;
    }
    else{
        echo "Worked!";

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

function changePermission($name, $permission_lvl) {
    $sql = "UPDATE users SET role=$permission_lvl WHERE name=$name";
}
?>