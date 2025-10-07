<?php

// Recupero i valori dall'url
$albumName = $_POST['albumName'];
$artistName = $_POST['artistName'];
$coverUrl = $_POST['coverUrl'];
$yop = $_POST['YOP'];
$albumGenre = $_POST['albumGenre'];

// Se tutti i valori sono settati...
if (isset($albumName) && isset($artistName) && isset($yop) && isset($albumGenre) && isset($coverUrl)) {
    
    // Recupero la lista degli oggetti dal json
    $string = file_get_contents('./disks.json');

    // Converto la stringa in array associativo
    $disks = json_decode($string, true);

    // Creo il nuovo oggetto
    $newAlbum = [
        "titolo" => $albumName,
        "artista" => $artistName,
        "urlCover" => $coverUrl,
        "annoPubblicazione" => $yop,
        "genere" => $albumGenre
    ];

    // Aggiungo il nuovo oggetto alla lista
    $disks[] = $newAlbum;

    // Converto la struttua dati da php a json
    $updated_disks = json_encode($disks);

    // Sovrascrivo il json
    file_put_contents('./disks.json', $updated_disks);
    
    // Reindirizzo l'utente alla pagina principale
    header('Location: ./index.php');
}

?>