<?php

include_once ('config.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    $datetime = time();

    $row = $db->query('SELECT clientname FROM statistics WHERE ip = ?', $ip)->fetchArray();

    if ($row['clientname']) {
        $clientname = $row['clientname'];
    } else {
        $clientname = 'User-' . $datetime;
    }

    $insert = $db->query('INSERT INTO statistics (ip,datetime,clientname) VALUES (?,?,?)', $ip, $datetime, $clientname);

}