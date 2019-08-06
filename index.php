<?php

$db = new PDO(
    'mysql:host=192.168.20.20; dbname=Project2',
    'root',
    '');

$db->setAttribute(
    PDO::ATTR_DEFAULT_FETCH_MODE,
    PDO::FETCH_ASSOC);

$sql = $db->prepare('SELECT * FROM `Plants`;');

$sql->execute();

$results = $sql->fetchAll();

var_dump($results);


?>

<!DOCTYPE html>
<html lang="eng">
<head>
    <meta charset="utf-8">
    <title>Collectors App</title>
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="normalize.css">
</head>
<body>

</body>
</html>
