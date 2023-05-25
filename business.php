<?php

require '../../vendor/autoload.php';
use MongoDB\BSON\ObjectID;

function get_db()
{
    $mongo = new MongoDB\Client(
        "mongodb://localhost:27017/wai",
        [
            'username' => 'wai_web',
            'password' => 'w@i_w3b',
        ]);

    $db = $mongo->wai;

    return $db;
}
function getImages()
{
	$db = get_db();
	$images = $db->images->find();
	return $images;
}
function addImage($image)
{
	$db = get_db();
	$db->images->insertOne($image);
}
function findUser($nick)
{
	$db = get_db();
	$user = $db->users->findOne(['name' => $nick]);
	return $user;
}
function addUser($user)
{
	$db = get_db();
	$db->users->insertOne($user);
}
function numberOfImages()
{
	$db = get_db();
    $number = $db->images->count();
	return $number;
}
function galeryPage($options)
{
	$db = get_db();
	$images = $db->images->find([], $options);
	return $images;
}
?>